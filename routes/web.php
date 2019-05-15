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
Route::get('/campaign', 'CampaignManagerController@index');
Route::post('/campaign', 'CampaignManagerController@index');


// Route::resource('campaign', 'CampaignManagerController');




Route::get('/slider', function () {
    return view('slider2');
});



// Route::post('/campaign', function () {
//     return view('new');
// });




Auth::routes();

Route::match(['get', 'post'],'/home_details','HomeDetailsController@index');

Route::get('/home', 'HomeController@index')->name('home');
