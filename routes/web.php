<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth ::routes();

Route::resource('/', 'App\Http\Controllers\HomeController');

Route::resource('agenda', 'App\Http\Controllers\AgendaController')->middleware('auth');

Route::resource('entrar', 'App\Http\Controllers\EntrarController');

Route::resource('api', 'App\Http\Controllers\ApiController');