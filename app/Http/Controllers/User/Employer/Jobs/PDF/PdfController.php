<?php

namespace App\Http\Controllers\User\Employer\Jobs\PDF;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generateJobPDF($id)
    {
        $job = Job::findOrFail($id);
        $data = [
            'job' => $job,
        ];
        $pdf = FacadePdf::loadView('user.employer.jobs.pdf.job-pdf', $data);
        $pdf->setPaper('L');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        // $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'ALSHOLA.com', null,
        55, array(0,0,0),2,2,-30);
        return $pdf->download('ALSHOLA-JOB-'.$job->post_number.'.pdf');
    }//end method

}
