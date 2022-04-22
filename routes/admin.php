<?php

use App\Http\Livewire\Admin\Views\Dashboard as AdminViewsDashboard;
use App\Http\Livewire\Admin\Views\Jobs\ActiveJobs;
use App\Http\Livewire\Admin\Views\Jobs\AllJobs;
use App\Http\Livewire\Admin\Views\Jobs\CompletedJobs;
use App\Http\Livewire\Admin\Views\Jobs\NewJobs;
use App\Http\Livewire\Admin\Views\Jobs\PendingJobs as JobsPendingJobs;
use App\Http\Livewire\Admin\Views\Profile\PasswordUpdate;
use App\Http\Livewire\Admin\Views\Profile\ProfileShow;
use App\Http\Livewire\User\Employer\Views\Jobs\PendingJobs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


    });
