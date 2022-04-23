<?php

use App\Http\Controllers\User\Employer\Jobs\EmployerJobsController;
use App\Http\Controllers\User\Employer\Jobs\JobController;
use App\Http\Livewire\User\Employee\Views\Dashboard;
use App\Http\Livewire\User\Employer\Views\Dashboard as ViewsDashboard;
use App\Http\Livewire\User\Employer\Views\Jobs\ActiveJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\AddJob;
use App\Http\Livewire\User\Employer\Views\Jobs\AllJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\CompletedJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\JobCreation;
use App\Http\Livewire\User\Employer\Views\Jobs\JobDetails;
use App\Http\Livewire\User\Employer\Views\Jobs\PendingJobs;
use App\Http\Livewire\User\Employer\Views\Profile\ProfileShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('front.home');
})->name('home');
Route::get('/about', function () {
    return view('front.about');
})->name('about');

Route::get('/category', function () {
    return view('front.category');
})->name('categories');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

Route::group(['middleware' => ['auth']], function()
{
    //Talented Routes
    Route::group(['prefix' => 'talented' , 'middleware' => ['employeeCheck'] ] , function(){
        Route::get('dashboard' , Dashboard::class)->name('employee.dashboard');
    });

    // Employer Routes
    Route::group(['prefix' => 'employer' , 'middleware' => ['employerCheck' ] ] , function(){
        Route::get('dashboard' , ViewsDashboard::class)->name('employer.dashboard');
        // Jobs Routes
        Route::resource('/job' , JobController::class);
        Route::get('/jobs/all' , [EmployerJobsController::class , 'allJobs'])->name('employer.jobs.all');
        Route::get('/jobs/completed' , [EmployerJobsController::class , 'allCompletedJobs'])->name('employer.jobs.completed');
        Route::get('/jobs/active' , [EmployerJobsController::class , 'allActiveJobs'])->name('employer.jobs.active');
        Route::get('/jobs/pending' , [EmployerJobsController::class , 'allPendingJobs'])->name('employer.jobs.pending');;
        Route::get('/jobs/cancelled' , [EmployerJobsController::class , 'allCanelledJobs'])->name('employer.jobs.cancelled');;
        // Route::get('/job/details/{id}' , JobDetails::class)->name('job.details');
        // Route::get('/jobs/active' , ActiveJobs::class)->name('employer.jobs.active.all');
        // Route::get('/jobs/completed' , CompletedJobs::class)->name('employer.jobs.completed.all');
        // Route::get('/jobs/pending' , PendingJobs::class)->name('employer.jobs.pending.all');

        // profile
        Route::get('/profile' , ProfileShow::class)->name('employer.profile');
        Route::get('test' , function()
        {
            return Storage::download('public/uploads/attachments/jobs/5/snapchat.png');
        });

    });

});


Auth::routes();

Route::get('/home' , function()
{
    return redirect(route('home'));
});



