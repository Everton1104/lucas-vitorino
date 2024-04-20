<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth ::routes();

Route::resource('/', 'App\Http\Controllers\HomeController');

Route::resource('agenda', 'App\Http\Controllers\AgendaController')->middleware('auth');
