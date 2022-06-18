<?php

use App\Http\Controllers\User\Employer\Jobs\PDF\PdfController;
use App\Http\Helpers\ApplicationHelper;
use App\Http\Livewire\Admin\Veiws\Settings\Sectors\AllSectors;
use App\Http\Livewire\Admin\View\Users\Profile\ShowUserProfile;
use App\Http\Livewire\Admin\Views\Admin\Sectors\AllSectors as SectorsAllSectors;
use App\Http\Livewire\Admin\Views\CandidacyOrders\AllCandidacyOrderRecommendations;
use App\Http\Livewire\Admin\Views\Contacts\EmployerContacts;
use App\Http\Livewire\Admin\Views\Contacts\TalentContacts;
use App\Http\Livewire\Admin\Views\Dashboard as AdminViewsDashboard;
use App\Http\Livewire\Admin\Views\Jobs\ActiveJobs;
use App\Http\Livewire\Admin\Views\Demands\AllJobs;
use App\Http\Livewire\Admin\Views\Jobs\JobDetails;
use App\Http\Livewire\Admin\Views\Jobs\JobDetailsEdit;
use App\Http\Livewire\Admin\Views\Profile\PasswordUpdate;
use App\Http\Livewire\Admin\Views\Profile\ProfileShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Views\Contacts\GuestContacts;
use App\Http\Livewire\Admin\Views\Jobs\CanclledJobs;
use App\Http\Livewire\Admin\Views\Roles\AllRoles;
use App\Http\Livewire\Admin\Views\Roles\CreateRole;
use App\Http\Livewire\Admin\Views\Roles\RoleEdit;
use App\Http\Livewire\Admin\Views\Users\AddUser;
use App\Http\Livewire\Admin\Views\Users\AllUsers;
use App\Models\Attachment;
use Spatie\Permission\Contracts\Role;

use function GuzzleHttp\Promise\all;
use App\Http\Livewire\Admin\Views\Applications\AllAplications;
use App\Http\Livewire\Admin\Views\Applications\ApplicationAttachments;
use App\Http\Livewire\Admin\Views\Applications\Notes\ApplicationAllNotes;
use App\Http\Livewire\Admin\Views\Applications\ApplicationsWaitingForMedical;
use App\Http\Livewire\Admin\Views\Applications\ApplicationsWaitingForVisa;
use App\Http\Livewire\Admin\Views\CandidacyOrders\AllCandidacyOrders;
use App\Http\Livewire\Admin\Views\Demands\NewDemand;
use App\Http\Livewire\Admin\Views\Users\AddNewClientOrAgent;
use App\Http\Livewire\Admin\Views\Users\AllAgentsOrClients;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Http\Livewire\Admin\Views\Demands\NewRequestJob;
use App\Http\Livewire\Admin\Views\Settings\Nationalities\AddNewNationality;
use App\Http\Livewire\Admin\Views\Settings\Nationalities\AllNationalities;
use App\Http\Livewire\Admin\Views\Settings\Sectors\AddNewSector;
use App\Http\Livewire\Admin\Views\Settings\Titles\AddNewTitle;
use App\Http\Livewire\Admin\Views\Settings\Titles\AllTitles;
use App\Http\Livewire\Admin\Views\Users\Profile\ShowUserProfile as ProfileShowUserProfile;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\UserAttachment;
use App\Http\Livewire\Admin\Views\Jobs\SendJobToAgent;
use App\Http\Livewire\Admin\Views\Applications\ApplicationDetails;
use App\Http\Livewire\Admin\Views\Demands\DemandDetails;
use App\Http\Livewire\Admin\Views\Settings\Currency\AddCurrency;
use App\Http\Livewire\Admin\Views\Settings\Currency\AllCurrencies;
use App\Models\Currency;
use App\Http\Controllers\HelperControllers\AdminDemandController;
use App\Http\Controllers\HelperControllers\NotificaitonHelperController;
use App\Http\Helpers\DemandHelper;
use App\Http\Livewire\Admin\Views\Settings\GeneralBessniuessSettings;
use App\Models\BusinessSetting;
use App\Models\Title;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;

//prefix => admin

    Route::redirect('/' , '/admin/login');

    Route::get('login' , function()
        {
            if(!Cache::has('businessSetting'))
            {
                Cache::rememberForever('businessSetting' , function()
                {
                    return DB::table('business_settings')->get();
                });
            }
                return view('auth.admin.login');
        });

    Route::group(['middleware' => ['auth' , 'authAdmin'] ] , function()
    {
        Route::get('dashboard' , AdminViewsDashboard::class)->name('admin.dashboard');
        Route::get('profile' , ProfileShow::class)->name('admin.profile');
        Route::get('passwrod/update' , PasswordUpdate::class)->name('admin.password');

        //jobs
        Route::get('jobs/all' , AllJobs::class)->name('admin.jobs.all');
        Route::get('/demand/new' , NewDemand::class)->name('admin.demand.new');
        Route::get('/demand/{id}/details' , DemandDetails::class)->name('admin.demand.details');
        Route::get('/demand/requested' , NewRequestJob::class)->name('admin.demand.requested');
        Route::get('job/{id}/send-to-agent' , SendJobToAgent::class)->name('admin.send-job-to-agent');
        Route::get('/job/pdf/{id}' ,  [PdfController::class , 'generateJobPDF'])->name('admin.pdf.generate');
        Route::get('/aplication/pdf/{id}' ,  [PdfController::class , 'generateApplicationPDF'])->name('admin.application.pdf.generate');
        Route::post('/job/{id}/change-status' , [AdminDemandController::class , 'changeDemandStatus'])->name('admin.demand.chane-status');
        Route::post('/demand/{id}/set-terms'  , [DemandHelper::class , 'setDemandTermsAndSendToAgent'])->name('admin.demand.set-terms');

        //Settings
        Route::get('sector/new' , AddNewSector::class)->name('admin.sector.new');
        Route::get('sector/all' , \App\Http\Livewire\Admin\Views\Settings\Sectors\AllSectors::class)->name('admin.sector.all');

        Route::get('nationality/all' , AllNationalities::class)->name('admin.nationality.all');
        Route::get('nationality/new' , AddNewNationality::class)->name('admin.nationality.new');
        Route::get('title/new' , AddNewTitle::class)->name('admin.title.new');
        Route::get('title/all' , AllTitles::class)->name('admin.title.all');

        Route::get('currency/all' , AllCurrencies::class)->name('admin.currency.all');
        Route::get('currency/new' , AddCurrency::class)->name('admin.currency.new');

        Route::get('/general-settings' , GeneralBessniuessSettings::class)->name('admin.settings.general');



        // Route::get('job/details/{id}' , JobDetails::class)->name('admin.job.details');
        // Route::get('job/details/{id}/edit' , JobDetailsEdit::class)->name('admin.job.details.edit');


        //Attachments Rotues:
        /*
        Route::get('open/{jobId}/{fileName}' , function($jobId , $fileName)
        {
            return response()->file(public_path('storage/uploads/attachments/jobs/'.$jobId.'/'.$fileName));
        })->name('file.open');
        */

        // Download job attachments
        Route::get('download/{jobId}/{fileName}' , function($jobId , $fileName)
        {
            try{
                return Storage::download('public/uploads/attachments/jobs/'.$jobId.'/'.$fileName);
            }Catch(Throwable $e)
            {
                notify()->error('someting went wrong');
                return redirect()->back();
            }
        })->name('file.download');

        //Download job applications  cv
        Route::get('downloadcv/{jobId}/{fileName}/{userId}' , function($jobId , $fileName , $userId)
        {
            try{
                return Storage::download('public/uploads/applications/jobs/'.$jobId.'/'.$userId.'/cv'.'/'.$fileName);
            }Catch(Throwable $e)
            {
                notify()->error('someting went wrong');
                return redirect()->back();
            }
        })->name('cv.download');


        //delete file from storage.
        Route::get('delete/{jobId}/{fileName}' , function($jobId , $fileName)
        {
            try{
                Storage::delete('public/uploads/attachments/jobs/'.$jobId.'/'.$fileName);
                Attachment::where([['job_id' , $jobId] , ['name' , $fileName]])->delete();
                notify()->success('file deleted Succesfully');
                return redirect()->back();
            }Catch(Throwable $e)
            {
                notify()->error('someting went wrong');
                return redirect()->back();
            }
        })->name('file.delete');


        /* Users Managment */
        Route::get('agent/create' , AddNewClientOrAgent::class)->name('agent.create');
        Route::get('client/create' , AddNewClientOrAgent::class)->name('client.create');
        Route::get('/agent/all' , AllAgentsOrClients::class)->name('agent.list');
        Route::get('/client/all' , AllAgentsOrClients::class)->name('client.list');
        //Talents Routes:

        //Employer Routes
        Route::get('/users/add' , AddUser::class)->name('admin.users.add');
        Route::get('/users/all' , AllUsers::class)->name('admin.users.all');
        Route::get('profile/{id}' , ProfileShowUserProfile::class)->name('admin.user.profile.show');

        /* Users Managment */


        //Applications Routes

        Route::get('/application/{id}/details' , ApplicationDetails::class)->name('admin.application.details');
        Route::get('/applications/all' , AllAplications::class)->name('admin.applications.all');
        Route::get('/applications/medical' , ApplicationsWaitingForMedical::class)->name('admin.applications.medical');
        Route::get('/applications/visa' , ApplicationsWaitingForVisa::class)->name('admin.applications.visa');
        Route::get('/applications/{id}/notes/all' , ApplicationAllNotes::class)->name('admin.application.notes.all');
        Route::get('/applications/{id}/attachments' , ApplicationAttachments::class)->name('admin.application.attachments.all');
        Route::get('/application/substatus/{id}' , [ApplicationHelper::class , 'getSubStatuses']);
        Route::post('/application/{id}/status/change' , [ApplicationHelper::class , 'postChangeApplicationStatus'])->name('admin.application.change-status');
        Route::get('/application/{id}/attachment/{fileName}/download' , function($id , $fileName , )
        {
            $application  = Application::with('job:id')->findOrFail($id);
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                return Storage::download('public/uploads/applications/'.$application->id.'/'.'attachments'.'/'.$fileName);
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.application.attachment.download');

        Route::get('/application/{id}/attachment/{fileName}/delete' , function($id , $fileName , )
        {
            $application  = Application::with('job:id')->findOrFail($id);
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                Storage::delete('public/uploads/applications/'.$application->id.'/'.'attachments'.'/'.$fileName);
                ApplicationAttachment::whereApplicationId($id)->where('name' , $fileName)->first()->delete();
                notify()->success('Attachment Deleted Successfully');
                return redirect()->back();
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.application.attachment.delete');

        Route::get('/application/{id}/attachment/{fileName}' , function($id , $fileName , )
        {
            $application  = Application::with('job:id')->findOrFail($id);
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                return response()->file(Storage::get('public/uploads/applications/'.$application->id.'/'.'attachments'.'/'.$fileName));
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.application.attachment.open');

        //Contacts routes
        Route::get('/employer/queries'  , EmployerContacts::class)->name('admin.contacts.employers');
        Route::get('/employee/queries'  , TalentContacts::class)->name('admin.contacts.talents');
        Route::get('/guests/queries'  , GuestContacts::class)->name('admin.contacts.guests');
        Route::get('guests/notification/{notification}' , [NotificaitonHelperController::class , 'markNotification'])->name('admin.contact.notficiation');

        //candidacy orders routes
        Route::get('/candidacy/orders/all'  , AllCandidacyOrders::class)->name('admin.candidacy.orders.all');
        Route::get('/candidacy/{id}/recommendations'  , AllCandidacyOrderRecommendations::class)->name('admin.candidacy.orders.recommendations.all');


        //Roles Routes:
        Route::get('roles' , AllRoles::class)->name('roles.all');
        Route::get('roles/add' , CreateRole::class)->name('roles.add');
        Route::get('roles/edit/{id}' , RoleEdit::class)->name('roles.edit');



        /**
         *
         * Download User Attachments
         * Like: agreement , license , etc..
         */

        Route::get('/user/{userId}/attachment/{folderName}/download/{fileName}' , function($userId , $folderName , $fileName)
        {
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                return Storage::download('public/uploads/users/'.$userId.'/'.'attachments/'.$folderName.'/'.$fileName);
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.user.attachment.download');

        Route::get('/user/{userId}/attachment/{folderName}/delete/{fileName}' , function($userId , $folderName , $fileName)
        {
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                Storage::delete('public/uploads/users/'.$userId.'/'.'attachments/'.$folderName.'/'.$fileName);
                UserAttachment::where([ ['user_id' , $userId] , ['name' , $fileName] , ['folder' , $folderName]])->first()->delete();
                notify()->success('file deleted successfully');
                return redirect()->back();
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.user.attachment.delete');




        Route::get('test' , [DemandHelper::class , 'testInvoice']);
    });


