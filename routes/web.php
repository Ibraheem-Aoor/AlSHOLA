<?php

use App\Http\Livewire\Test;
use App\Http\Livewire\User\Employee\Views\Dashboard;
use App\Http\Livewire\User\Employer\Views\Dashboard as ViewsDashboard;
use App\Http\Livewire\User\Employer\Views\Jobs\ActiveJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\AllJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\CompletedJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\JobCreation;
use App\Http\Livewire\User\Employer\Views\Jobs\JobDetails;
use App\Http\Livewire\User\Employer\Views\Jobs\PendingJobs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::group(['prefix' => 'employer' , 'middleware' => ['employerCheck'] ] , function(){
        Route::get('dashboard' , ViewsDashboard::class)->name('employer.dashboard');
        // Jobs Routes
        Route::get('/jobs' , AllJobs::class)->name('jobs.show');
        Route::get('/job/create' , JobCreation::class)->name('job.create');
        Route::get('/job/details/{id}' , JobDetails::class)->name('job.details');
        Route::get('/jobs/active' , ActiveJobs::class)->name('employer.jobs.active.all');
        Route::get('/jobs/completed' , CompletedJobs::class)->name('employer.jobs.completed.all');
        Route::get('/jobs/pending' , PendingJobs::class)->name('employer.jobs.pending.all');
    });

});


Auth::routes();

Route::get('/home' , function()
{
    return redirect(route('home'));
});



Route::get('/test' , Test::class);
