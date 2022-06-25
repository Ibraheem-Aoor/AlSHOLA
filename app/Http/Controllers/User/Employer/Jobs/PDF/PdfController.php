<?php

namespace App\Http\Controllers\User\Employer\Jobs\PDF;

use App\Http\Controllers\Controller;
use App\Http\Helpers\HistoryRecordHelper;
use App\Models\Application;
use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generateJobPDF($id)
    {
        $job = Job::with(['subJobs.title.sector' , 'subJobs.nationality', 'user' , 'attachments' , 'terms' , 'subStatus'])
                ->findOrFail($id);
        $data = [
            'job' => $job,
        ];
        $pdf = FacadePdf::loadView('user.employer.jobs.pdf.job-pdf', $data);
        $pdf->setPaper('A4');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        // $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'ALSHOALA.com', null,
        55, array(0,0,0),2,2,-30);
        HistoryRecordHelper::registerDemandLog('Demand PDF Printing' .'<a href="/admin/demand/'.$this->job->id.'/details">'.'( '.$this->job->post_number.' )'.'</a>');

        return $pdf->download('ALSHOALA-JOB-'.$job->post_number.'.pdf');
    }//end method



    public function generateApplicationPDF($id)
    {
        $application =  Application::with(['job:id,post_number' , 'employers'  , 'user', 'educations' , 'title.sector' , 'attachments'])->with('job.title.sector')->findOrFail($id);
        $data = [
            'application' => $application,
        ];
        $pdf = FacadePdf::loadView('user.employer.applications.pdf.application-pdf', $data);
        $pdf->setPaper('A4');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        // $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'ALSHOALA.com', null,
        55, array(0,0,0),2,2,-30);
        HistoryRecordHelper::registerApplicationLog('Application PDF Printing' .'<a href="/admin/application/'.$application->id.'/details">'.'( '.$application->ref.' )'.'</a>');
        return $pdf->download('ALSHOALA-Application-'.$application->ref.'.pdf');
    }//end method

}
