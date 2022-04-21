<?php

use App\Http\Livewire\Admin\Views\Dashboard as AdminViewsDashboard;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



    Route::get('dashboard' , AdminViewsDashboard::class);
