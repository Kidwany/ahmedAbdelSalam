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

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => ['Maintenance', 'Lang']], function () {

    Route::get('lang/{lang}', 'LanguageController@changeLanguage');

    /*=======   Return Home     ========*/
    Route::get('/', 'WebsitePagesController@index');

    /*=======   Return about    ========*/
    Route::get('/about', 'WebsitePagesController@about');
    Route::get('/team', 'WebsitePagesController@team');

    /*=======   Return gallery  ========*/
    Route::get('/gallery', 'WebsitePagesController@gallery');

    /*=======   Return Service    ========*/
    Route::get('/service', 'WebsitePagesController@service');

    /*=======   Return Blog    ========*/
    /*=======   Return Blog    ========*/
    Route::get('/blog', 'WebsitePagesController@blog');
    Route::get('/blog/{id}', 'WebsitePagesController@blogDetails');

    /*=======   Return Blog    ========*/
    Route::get('/offers', 'WebsitePagesController@offers');

    /*=======   Return Album    ========*/
    Route::get('/album', 'WebsitePagesController@album');
    Route::get('/album/{id}', 'WebsitePagesController@albumDetails');


    /*=======   Return Contact     ========*/
    Route::get('/contact', 'WebsitePagesController@contact');
    Route::post('message', 'WebsitePagesController@message');


    /*=======   Reserve   ========*/
    Route::get('/reserve', 'WebsitePagesController@reserve');
    Route::post('/reserve', 'WebsitePagesController@reserveAppointment');


    /*=======   Return Service    ========*/
    Route::get('/service', 'WebsitePagesController@service');


    /*=======   Return Service Details     ========*/
    Route::get('/service-details/{id}', 'WebsitePagesController@serviceDetails');


    /*=======   Reserve   ========*/
    Route::get('/reserve', 'WebsitePagesController@reserve');
    Route::post('/reserve', 'WebsitePagesController@reserveAppointment');

});


Route::get('maintenance', function () {
    return 'maintenance';
});


Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
