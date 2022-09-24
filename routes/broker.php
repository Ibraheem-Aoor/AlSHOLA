<?php

use App\Http\Controllers\User\Employer\Jobs\JobController;
use App\Http\Livewire\Coordinator\AllDemands;
use App\Http\Livewire\Coordinator\Dashboard;
use App\Http\Livewire\Coordinator\Views\BrokerDemandDetails;
use App\Http\Livewire\Coordinator\Views\NewDemand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::redirect('/' , '/broker/login')->middleware('guest');
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

Route::get('test' , function(){
    return Auth::user();
});
Route::group([ 'middleware' => 'auth'  , 'as' => 'broker.'] , function()
{
    Route::get('/dashboard' , Dashboard::class)->name('dashboard');
    Route::get('/demands' , AllDemands::class)->name('demands');
    Route::get('/demands/new' , NewDemand::class)->name('demands.new');
    Route::get('/demand/{id}/details' , BrokerDemandDetails::class)->name('demand.details');
    Route::get('/sector/{id}' , [JobController::class , 'setSelectedSector']);

});
