<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/clear_cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('route:clear');
	
    return 'DONE'; //Return anything
});


Route::post('submit/store', 'ResidentsController@store')->name('submit.store');
Route::post('getinfo', 'ResidentsController@show')->name('getinfo.show');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/camera', function () {
     return view('camera');
});

Route::get('camera/user/{id?}', 'ResidentsController@camera');


Route::get('/residentlist', function () {
     return view('residentlist');
});