<?php

use App\Http\Livewire\Admin\Views\Contacts\EmployerContacts;
use App\Http\Livewire\Admin\Views\Contacts\TalentContacts;
use App\Http\Livewire\Admin\Views\Dashboard as AdminViewsDashboard;
use App\Http\Livewire\Admin\Views\Employers\AllEmployers;
use App\Http\Livewire\Admin\Views\Jobs\ActiveJobs;
use App\Http\Livewire\Admin\Views\Jobs\AllJobs;
use App\Http\Livewire\Admin\Views\Jobs\CompletedJobs;
use App\Http\Livewire\Admin\Views\Jobs\JobDetails;
use App\Http\Livewire\Admin\Views\Jobs\JobDetailsEdit;
use App\Http\Livewire\Admin\Views\Jobs\NewJobs;
use App\Http\Livewire\Admin\Views\Jobs\PendingJobs as JobsPendingJobs;
use App\Http\Livewire\Admin\Views\Profile\PasswordUpdate;
use App\Http\Livewire\Admin\Views\Profile\ProfileShow;
use App\Http\Livewire\Admin\Views\Talents\AllTalents;
use App\Http\Livewire\Admin\Views\Talents\SendJobToTalent;
use App\Http\Livewire\User\Employer\Views\Jobs\PendingJobs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Views\Contacts\GuestContacts;
use App\Models\Attachment;

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
        Route::get('jobs/completed' , CompletedJobs::class)->name('admin.jobs.completed');
        Route::get('jobs/latest' , NewJobs::class)->name('admin.jobs.latest');
        Route::get('jobs/active' , ActiveJobs::class)->name('admin.jobs.active');
        Route::get('jobs/pending' , JobsPendingJobs::class)->name('admin.jobs.pending');


        Route::get('job/details/{id}' , JobDetails::class)->name('admin.job.details');
        Route::get('job/details/{id}/edit' , JobDetailsEdit::class)->name('admin.job.details.edit');


        //Attachments Rotues:
        /*
        Route::get('open/{jobId}/{fileName}' , function($jobId , $fileName)
        {
            return response()->file(public_path('storage/uploads/attachments/jobs/'.$jobId.'/'.$fileName));
        })->name('file.open');
        */

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



        //Talents Routes:
        Route::get('/talent/all' , AllTalents::class)->name('talent.all');
        Route::get('/talent/find/{id}' , SendJobToTalent::class)->name('talent.recommend');

        //Employer Routes
        Route::get('/employer/all' , AllEmployers::class)->name('employer.all');


        //Contacts routes
        Route::get('/employer/queries'  , EmployerContacts::class)->name('admin.contacts.employers');
        Route::get('/employee/queries'  , TalentContacts::class)->name('admin.contacts.talents');
        Route::get('/guests/queries'  , GuestContacts::class)->name('admin.contacts.guests');

    });
