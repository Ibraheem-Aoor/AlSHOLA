<?php

use App\Http\Controllers\ApplicationSearchController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Employer\Jobs\PDF\PdfController;
use App\Http\Controllers\HelperControllers\NotificaitonHelperController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobSeacrhController;
use App\Http\Controllers\User\Employer\Jobs\EmployerJobsController;
use App\Http\Controllers\User\Employer\Jobs\JobController;
use App\Http\Controllers\User\Employer\Jobs\Notes\NoteController;
use App\Http\Livewire\User\Employee\Views\AvilabeJobs;
use App\Http\Livewire\User\Employee\Views\Dashboard;
use App\Http\Livewire\User\Employee\Views\JobDetails;
use App\Http\Livewire\User\Employer\Views\Dashboard as ViewsDashboard;
use App\Http\Controllers\User\Contact\UserContact;
use App\Http\Controllers\User\Employee\ApplicationController;
use App\Http\Controllers\User\Employee\CandidacyController;
use App\Http\Controllers\User\Employee\Cases\CaseController as CasesCaseController;
use App\Http\Controllers\User\Employer\Applications\EmployerApplicationsController;
use App\Http\Controllers\User\Employer\Cases\CaseController;
use App\Http\Controllers\User\Employer\Jobs\PDF\PdfController as PDFPdfController;
use App\Http\Controllers\User\GeneralJobController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Helpers\InvoiceHelper;
use App\Http\Livewire\Admin\Views\Cases\CaseDetails;
use App\Models\Application;
use App\Models\BusinessSetting;
use App\Models\Title;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['middleware' => 'guestOnly'] , function()
{

    Route::get('/', function () {
        if(!Cache::has('businessSetting'))
        {
            Cache::rememberForever('businessSetting' , function()
            {
                return DB::table('business_settings')->get();
            });
        }
        return  view('front.home');
    })->name('home');


    Route::get('/about', function () {
        return view('front.about');
    })->name('about');

    Route::get('/category', function () {
        return view('front.category');
    })->name('categories');

    // Route::resource('/contact', ContactFormController::class);
});//end RouteGroup





Route::group(['middleware' => ['auth']], function()
{
    Route::get('guests/notification/{notification}', [NotificaitonHelperController::class, 'markNotification'])->name('mark.notficiation');

    Route::post('/application/attach' , [ApplicationController::class , 'uploadApplicationAttachment'])->name('application.file.upload');

    Route::resource('/job' , JobController::class);

        // Cse Attahments Routes
        Route::get('/case/download/{caseId}/{fileName}' , function($caseId , $fileName)
        {
            try{
                return Storage::download('public/uploads/cases/'.$caseId.'/'.$fileName);
            }Catch(Throwable $e)
            {
                return dd($e);
                notify()->error('someting went wrong');
                return redirect()->back();
            }
        })->name('user.case.file.download');

        Route::get('/case/open/{caseId}/{fileName}' , function($caseId , $fileName)
        {
            try{
                return response()->file(public_path('storage/uploads/cases/'.$caseId.'/'.$fileName));
            }Catch(Throwable $e)
            {
                return dd($e);
                notify()->error('someting went wrong');
                return redirect()->back();
            }
        })->name('user.case.file.view');


    Route::post('/application/{id?}' , [ApplicationController::class , 'createApplication'])->name('employee.application.create');


    Route::get('/invoice/prnt/{id}' , [ InvoiceHelper::class , 'printInvoice'])->name('invoice.print');


    //Client Filters
    Route::get('/job/pdf/{id}' ,  [PDFPdfController::class , 'generateJobPDF'])->name('job.pdf.generate');
    Route::get('/job/filter/{status}' ,  [JobSeacrhController::class , 'filterJobsStatus'])->name('job.filter');
    Route::get('/job/filter' ,  [JobSeacrhController::class , 'searchJob'])->name('job.search');
    Route::get('/application/filter/{status}' ,  [ApplicationSearchController::class , 'filterApplicationsStatus'])->name('appliction.filter');
    Route::get('/application/filter/substatus/{status}' ,  [ApplicationSearchController::class , 'filterApplicationsSubStatus'])->name('appliction.filter.sub_status');
    Route::get('/application/filter' ,  [ApplicationSearchController::class , 'searchApplication'])->name('application.search');

    //Agent Filters
    Route::get('/avilable_job/filter/{status}' ,  [JobSeacrhController::class , 'filterAgentJobs'])->name('agent-job.filter');
    Route::get('/avilable_job/filter' ,  [JobSeacrhController::class , 'searchAgentJobs'])->name('agent-job.search');
    Route::get('/agent-application/filter/{status}' ,  [ApplicationSearchController::class , 'filterAgentApplicationsStatus'])->name('agent-appliction.filter');
    Route::get('/agent-application/filter' ,  [ApplicationSearchController::class , 'searchAgentApplications'])->name('agent-application.search');



    Route::resource('profile', ProfileController::class);

    Route::post('/job/attachment/upload' , [GeneralJobController::class , 'uploadJobAttachment'] )->name('job.attachment.upload');
    Route::get('/application/{id}/attachment/{fileName}/download' , function($id , $fileName )
    {
        $application  = Application::with('job:id')->findOrFail($id);
        $jobId = $application->job->id;
        try{
            // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
            return Storage::download('public/uploads/applications/'.$application->id.'/attachments'.'/'.$fileName);
        }Catch(Throwable $e)
        {
            return dd($e->getMessage());
            return redirect()->back();
        }
    })->name('application.attachment.download');

    Route::get('/application/{id}/attachment/{fileName}/open' , function($id , $fileName )
    {
        $application  = Application::with('job:id')->findOrFail($id);
        $jobId = $application->job->id;
        try{
            // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
            // return Storage::download('public/uploads/applications/'.$application->id.'/attachments'.'/'.$fileName);
            return response()->file(public_path('storage//uploads/applications/'.$application->id.'/attachments'.'/'.$fileName));

        }Catch(Throwable $e)
        {
            return dd($e->getMessage());
            return redirect()->back();
        }
    })->name('application.attachment.open');
    Route::post('application/ticket' , [ApplicationController::class , 'createApplicationVisaTicket'])->name('employee.application.ticket.create');


    //Talented Routes
    Route::group(['prefix' => 'talented' , 'middleware' => ['employeeCheck'] ] , function(){
        if(!Cache::has('businessSetting'))
        {
            Cache::rememberForever('businessSetting' , function()
            {
                return DB::table('business_settings')->get();
            });
        }
        Route::get('dashboard' , Dashboard::class)->name('employee.dashboard');
        Route::get('jobs/avilable' , AvilabeJobs::class)->name('employee.jobs.avilable');
        Route::get('job/{id}' , JobDetails::class)->name('employee.job.details');

        //Job Notes
        Route::post('/job/refuse/{id}' , [NoteController::class , 'refuseJob'])->name('employee.job.refuse');
        Route::post('/job/sendnote/{id}' , [NoteController::class , 'store'])->name('employee.job.note.create');


        // Case
        Route::group(['controller' => CasesCaseController::class , 'as'=>'employee.case.'  , 'prefix' => 'cases'] ,  function()
        {
            Route::get('/' , [CasesCaseController::class ,  'index'])->name('index');
            Route::get('/{id}' , [CasesCaseController::class ,  'showCase'])->name('show');
            Route::post('message/{id}' , [CasesCaseController::class , 'sendMessage'])->name('message');
            Route::post('attach/{id}' , [CasesCaseController::class , 'attachMoreFiles'])->name('attach');
        });


        //talent job application routes
        Route::get('/application-form/{id}' , [ApplicationController::class , 'showApplicationForm'])->name('employee.application.form');
        Route::get('application/all' , [ApplicationController::class , 'allApplications'])->name('employee.applications.all');
        Route::get('application/medical' , [ApplicationController::class , 'medicalApplications'])->name('employee.applications.medical');
        Route::get('application/visa' , [ApplicationController::class , 'visaApplications'])->name('employee.applications.visa');
        Route::get('application/{id}/notes' , [ApplicationController::class , 'applicationNotes'])->name('employee.application.notes');
        Route::get('application/{id}/attachments' , [ApplicationController::class , 'applicationAttachments'])->name('employee.application.attachments');
        Route::post('application/note/reply' , [ApplicationController::class , 'sendNoteToAdmin'])->name('employee.note.send');
        Route::get('/applications/{id}/details' , [ApplicationController::class , 'getDetails'])->name('employeee.application.details');

        //Invoices:
        Route::get('/invoices'  , [InvoiceController::class , 'emplyoeeInvoices'])->name('employee.invoices');



        //Candidacy oreders
        Route::get('recommendation/order/{id}' , [CandidacyController::class , 'index'])->name('employee.candidacy.order.index');
        Route::post('recommendation/order/{id}' , [CandidacyController::class , 'makeOrder'])->name('employee.candidacy.order.create');

    });//end Talent RouteGroup


    // Employer Routes
    Route::group(['prefix' => 'employer' , 'middleware' => ['employerCheck' ] ] , function(){
        if(!Cache::has('businessSetting'))
        {
            Cache::rememberForever('businessSetting' , function()
            {
                return DB::table('business_settings')->get();
            });
        }
        Route::get('dashboard' , ViewsDashboard::class)->name('employer.dashboard');
        // Jobs Routes
        Route::post('/jobs/edit-1-save/{id}' , [JobController::class , 'editStep_1'])->name('jobs.edit.step-1');
        Route::post('/jobs/edit-2-save/{id}' , [JobController::class , 'updateJob'])->name('jobs.edit.step-2');

        // Route::get('/setup-job' , [JobController::class , 'setupFrom'])->name('setupJob');
        Route::post('/setup/job' , [JobController::class , 'setup'])->name('creation-setup');
        Route::post('/setup-2/job' , [JobController::class , 'step2'])->name('creation-step-2');


        Route::get('/sector/{id}' , [JobController::class , 'setSelectedSector']);
        Route::get('/aplication/pdf/{id}' ,  [PDFPdfController::class , 'generateApplicationPDF'])->name('employer.application.pdf.generate');

        Route::group(['controller' => EmployerJobsController::class ], function()
        {
            Route::get('/jobs/all' , 'allJobs')->name('employer.jobs.all');
            Route::get('/jobs/completed' ,  'allCompletedJobs')->name('employer.jobs.completed');
            Route::get('/jobs/active' ,  'allActiveJobs')->name('employer.jobs.active');
            Route::get('/jobs/pending' ,  'allPendingJobs')->name('employer.jobs.pending');;
            Route::get('/jobs/cancelled' ,  'allCanelledJobs')->name('employer.jobs.cancelled');;
            Route::get('/jobs/returned' ,  'allReturnedJobs')->name('employer.jobs.returned');
        });

        //Job Notes Routes:
        Route::get('/job/{id}/notes' , [NoteController::class , 'index'])->name('employer.job.notes');
        Route::post('/job/{id}/note/reply' , [NoteController::class , 'sendJobNoteToAdmin'])->name('employer.job.note.send');

        //Applications
        Route::get('/applications/{id}/attachments' , [EmployerApplicationsController::class , 'applicationAttachments'])->name('employer.application.attachments');
        Route::get('/applications/{id}/details' , [EmployerApplicationsController::class , 'getDetails'])->name('employer.application.details');
        Route::get('/applications/all' , [EmployerApplicationsController::class , 'allForwardedApplications'])->name('employer.applications.all');
        Route::get('/applications/{id}' , [EmployerApplicationsController::class , 'getAllApplications'])->name('employer.job.applications.all');
        Route::get('/applications/medical' , [EmployerApplicationsController::class , 'allMedicalApplications'])->name('employer.applications.medical');
        Route::get('/applications/visa' , [EmployerApplicationsController::class , 'allVisaApplications'])->name('employer.applications.visa');
        Route::post('/applications/visa/upload' , [EmployerApplicationsController::class , 'createVisa'])->name('employer.application.visa.upload');
        Route::post('/applications/medical/accept' , [EmployerApplicationsController::class , 'UpgradeApplicationToNextStage'])->name('employer.application.upgrade');
        Route::post('/applications/send-note/{id}' , [EmployerApplicationsController::class , 'sendNoteToAdmin'])->name('employer.applications.note.send');
        Route::post('/applications/accept/{id}' , [EmployerApplicationsController::class , 'acceptApplication'])->name('employer.application.accept');
        Route::post('/applications/refuse/{id}' , [EmployerApplicationsController::class , 'refuseApplication'])->name('employer.application.refuse');


        //Invoices
        Route::get('/invoices'  , [InvoiceController::class , 'emplyoerInvoices'])->name('employer.invoices');

        //Cases
        Route::resource('cases', CaseController::class);
     // Case
     Route::group(['controller' => CaseController::class , 'as'=>'employer.case.'  , 'prefix' => 'cases'] ,  function()
     {
         Route::post('message/{id}' , [CaseController::class , 'sendMessage'])->name('message');
         Route::post('attach/{id}' , [CaseController::class , 'attachMoreFiles'])->name('attach');
         Route::post('get-selected-application' , [CaseController::class  , 'getSelectedApplicationDetails'])->name('get_application');
     });


        Route::get('title/{id}' , function($id)
        {
            return Title::findOrFail($id)->name;
        })->name('employer.title.all');

    });//end Emloyer RouteGroup.


    //General Routes for All Auth User Regard their type
        //contact
    // Route::get('/a/contact' , [UserContact::class , 'index'])->name('user.contact');
    // Route::post('/a/contact' , [UserContact::class , 'store'])->name('user.contact.make');

});


Auth::routes();

Route::get('/home' , function()
{
    return redirect(route('home'));
});




  // Download job

  Route::get('job/{jobId}/{fileName}' , function($jobId , $fileName)
  {
      try{
          return Storage::download('public/uploads/attachments/jobs/'.$jobId.'/'.$fileName);
      }Catch(Throwable $e)
      {
          notify()->error('someting went wrong');
          return redirect()->back();
      }
  })->name('job.attachment.download');


  Route::get('test' , function (){
    
        // return view('user.mail.user_mail');
  });


