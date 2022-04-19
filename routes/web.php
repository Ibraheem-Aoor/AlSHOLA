<?php

use App\Http\Livewire\User\Employee\Views\Dashboard;
use App\Http\Livewire\User\Employer\Views\Dashboard as ViewsDashboard;
use App\Http\Livewire\User\Employer\Views\Jobs\AllJobs;
use App\Http\Livewire\User\Employer\Views\Jobs\JobCreation;
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

Route::group(['middleware' => ['auth'] ], function()
{

    // Users Dashboards
    Route::get('talent_dashboard' , Dashboard::class)->middleware('employeeCheck')->name('employee.dashboard');
    Route::get('employer_dashboard' , ViewsDashboard::class)->middleware('employerCheck')->name('employer.dashboard');

    Route::get('/job/create' , JobCreation::class)->name('job.create');
    Route::get('/jobs' , AllJobs::class)->name('jobs.show');

});


Auth::routes();

Route::get('/home' , function()
{
    return redirect(route('home'));
});
