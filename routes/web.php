<?php

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



Route::resource('campaign', 'CampaignManagerController');



Route::get('/slider', function () {
    return view('slider2');
});


Route::get('/index', function () {
    return view('index');
});

Route::get('/new', function () {
    return "sdfs";
});



Auth::routes();

Route::match(['get', 'post'],'/home_details','HomeDetailsController@index');

Route::get('/home', 'HomeController@index')->name('home');
