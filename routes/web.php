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
    return view('content/homePage');
});


Route::get('/wisata', function () {
    return view('wisata/index');
});

Route::get('/contact', function () {
    return view('content/contact');
});

Route::post('saveTourism','TourismController@store')->name('saveTourism');
Route::get('/','TourismController@index')->name('/');

