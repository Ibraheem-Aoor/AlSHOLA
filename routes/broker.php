<?php

use App\Http\Livewire\Coordinator\AllDemands;
use App\Http\Livewire\Coordinator\Dashboard;
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
});
