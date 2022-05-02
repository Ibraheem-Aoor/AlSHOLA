<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\User\Employer\Jobs\EmployerJobsController;
use App\Http\Controllers\User\Employer\Jobs\JobController;
use App\Http\Controllers\User\Employer\Jobs\Notes\NoteController;
use App\Http\Livewire\User\Employee\Views\AvilabeJobs;
use App\Http\Livewire\User\Employee\Views\Dashboard;
use App\Http\Livewire\User\Employee\Views\JobDetails;
use App\Http\Livewire\User\Employer\Views\Dashboard as ViewsDashboard;
use App\Http\Controllers\User\Contact\UserContact;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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


Route::group(['middleware' => 'guestOnly'] , function()
{

    Route::get('/', function () {
        if(Cache::has('homePage'))
            return Cache::get('homePage');
        else
            {
                $data  = view('front.home')->render();
                Cache::put('homePage' , $data);
                return Cache::get('homePage');
            }
    })->name('home');


    Route::get('/about', function () {
        return view('front.about');
    })->name('about');

    Route::get('/category', function () {
        return view('front.category');
    })->name('categories');

    Route::resource('/contact', ContactFormController::class);
});//end RouteGroup



Route::group(['middleware' => ['auth']], function()
{
    //Talented Routes
    Route::group(['prefix' => 'talented' , 'middleware' => ['employeeCheck'] ] , function(){
        Route::get('dashboard' , Dashboard::class)->name('employee.dashboard');
        Route::get('jobs/avilable' , AvilabeJobs::class)->name('employee.jobs.avilable');
        Route::get('job/{id}' , JobDetails::class)->name('employee.job.details');

        //Job Notes
        Route::post('/job/refuse/{id}' , [NoteController::class , 'store'])->name('employee.job.refuse');
        Route::post('/job/sendnote/{id}' , [NoteController::class , 'store'])->name('employee.job.note.create');





    });//end Talent RouteGroup


    // Employer Routes
    Route::group(['prefix' => 'employer' , 'middleware' => ['employerCheck' ] ] , function(){
        Route::get('dashboard' , ViewsDashboard::class)->name('employer.dashboard');
        // Jobs Routes
        Route::resource('/job' , JobController::class);
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
        // Route::get('/profile' , ProfileShow::class)->name('employer.profile');
        Route::get('test' , function()
        {
            return Storage::download('public/uploads/attachments/jobs/5/snapchat.png');
        });

    });//end Emloyer RouteGroup.


    //General Routes for All Auth User Regard their type
        //contact
    Route::get('/a/contact' , [UserContact::class , 'index'])->name('user.contact');
    Route::post('/a/contact' , [UserContact::class , 'store'])->name('user.contact.make');
});


Auth::routes();

Route::get('/home' , function()
{
    return redirect(route('home'));
});



