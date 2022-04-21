<?php

use App\Http\Livewire\Admin\Views\Dashboard as AdminViewsDashboard;
use App\Http\Livewire\Admin\Views\Profile\PasswordUpdate;
use App\Http\Livewire\Admin\Views\Profile\ProfileShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//prefix => admin

    Route::get('login' , function()
        {
            return view('auth.admin.login');
        });

    Route::group(['middleware' => 'auth' , 'authAdmin'] , function()
    {
        Route::get('dashboard' , AdminViewsDashboard::class)->name('admin.dashboard');
        Route::get('profile' , ProfileShow::class)->name('admin.profile');
        Route::get('passwrod/update' , PasswordUpdate::class)->name('admin.password');

    });
