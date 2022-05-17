<?php

use App\Http\Livewire\Admin\View\Users\Profile\ShowUserProfile;
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
use App\Http\Livewire\Admin\Views\Users\Profile\ShowUserProfile as ProfileShowUserProfile;

//prefix => admin

    Route::get('login' , function()
        {
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
        Route::get('/demand/requested' , NewRequestJob::class)->name('admin.demand.requested');


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
        Route::get('/applications/all' , AllAplications::class)->name('admin.applications.all');
        Route::get('/applications/medical' , ApplicationsWaitingForMedical::class)->name('admin.applications.medical');
        Route::get('/applications/visa' , ApplicationsWaitingForVisa::class)->name('admin.applications.visa');
        Route::get('/applications/{id}/notes/all' , ApplicationAllNotes::class)->name('admin.application.notes.all');
        Route::get('/applications/{id}/attachments' , ApplicationAttachments::class)->name('admin.application.attachments.all');
        Route::get('/application/{id}/attachment/{fileName}/download/{userId}' , function($id , $fileName , $userId)
        {
            $application  = Application::with('job:id')->findOrFail($id);
            $jobId = $application->job->id;
            try{
                // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
                return Storage::download('public/uploads/applications/jobs/'.$jobId.'/'.$userId.'/attachments'.'/'.$fileName);
            }Catch(Throwable $e)
            {
                return dd($e->getMessage());
                return redirect()->back();
            }
        })->name('admin.application.attachment.download');

        //Contacts routes
        Route::get('/employer/queries'  , EmployerContacts::class)->name('admin.contacts.employers');
        Route::get('/employee/queries'  , TalentContacts::class)->name('admin.contacts.talents');
        Route::get('/guests/queries'  , GuestContacts::class)->name('admin.contacts.guests');

        //candidacy orders routes
        Route::get('/candidacy/orders/all'  , AllCandidacyOrders::class)->name('admin.candidacy.orders.all');
        Route::get('/candidacy/{id}/recommendations'  , AllCandidacyOrderRecommendations::class)->name('admin.candidacy.orders.recommendations.all');


        //Roles Routes:
        Route::get('roles' , AllRoles::class)->name('roles.all');
        Route::get('roles/add' , CreateRole::class)->name('roles.add');
        Route::get('roles/edit/{id}' , RoleEdit::class)->name('roles.edit');



    });


