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

/*==============================================   Dashboard Routes    ====================================================*/

Route::group(['middleware' => 'auth' ,'namespace' => 'Dashboard'], function () {


    /* -- Return Home Page -- */
    Route::get('/ahmdedAbdelsalamAdmin', 'DashboardController@index');

    /* -- Return Slider Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/slider', 'SliderController');

    /* -- Return Service Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/service', 'ServiceController');
    Route::get('/ahmdedAbdelsalamAdmin/service/{id}/create', 'ServiceController@createSubService');
    Route::post('/ahmdedAbdelsalamAdmin/sub-service/create', 'ServiceController@storeSub');

    /* -- Return Client Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/client', 'ClientController');

    /* -- Return Testimonial Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/testimonial', 'TestimonialController');

    /* -- Return Team Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/team', 'TeamController');

    /* -- Return Appointment Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/appointment', 'AppointmentController');

    /* -- Return Video Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/video', 'VideoController');


    /* -- Return Feature Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/feature', 'FeatureController');

    /* -- Return Video Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/blog', 'BlogController');

    /* -- Return Album Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/album', 'AlbumController');

    /* -- Return Gallery Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/gallery', 'GalleryController');
    Route::get('/ahmdedAbdelsalamAdmin/album/{id}/upload-to-gallery', 'AlbumController@uploadPage');
    Route::post('/ahmdedAbdelsalamAdmin/album/{id}/upload-to-gallery', 'AlbumController@upload');

    /* -- Return Message Page -- */
    Route::resource('/ahmdedAbdelsalamAdmin/message', 'MessageController');

    /*--------  About   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/about/edit', 'AboutController@edit');
    Route::patch('/ahmdedAbdelsalamAdmin/about/update', 'AboutController@update');

    /*--------  Contact   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/contact/edit', 'ContactController@edit');
    Route::patch('/ahmdedAbdelsalamAdmin/contact/update', 'ContactController@update');


    /*--------  Setting   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/setting/edit', 'SettingController@edit');
    Route::patch('/ahmdedAbdelsalamAdmin/setting/update', 'SettingController@update');

    
    /*=================================================================================================================*/
    /*----------------------------------------------  Seo   -----------------------------------------------------------*/
    /*=================================================================================================================*/
    /*--------  website Main Pages   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/website-pages', 'SeoController@websitePages');
    Route::get('/ahmdedAbdelsalamAdmin/seo/website-page/edit/{id}', 'SeoController@editWebsitePage');
    Route::patch('/ahmdedAbdelsalamAdmin/seo/website-page/edit/{id}', 'SeoController@updateWebsitePage');
    /*--------  website Open Graphs   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/open-graph', 'SeoController@openGraph'); /*--------  edit main pages open graph   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/main-pages-open-graph/edit/{id}', 'SeoController@editMainPageOpenGraph');
    Route::patch('/ahmdedAbdelsalamAdmin/seo/main-pages-open-graph/edit/{id}', 'SeoController@updateMainPageOpenGraph');
    /*--------  clinics pages open graph   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/services-pages-open-graph/edit/{id}', 'SeoController@editServicePagesOpenGraph');
    /*--------  articles pages open graph   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/articles-pages-open-graph/edit/{id}', 'SeoController@editArticlesPagesOpenGraph');
    /*--------  clinics pages open graph   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/edit-open-graph/{id}', 'SeoController@editOpenGraph');
    /*--------  website Main Pages   --------*/
    /*-------- sameAs   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/same-as', 'SeoController@sameAs');
    Route::get('/ahmdedAbdelsalamAdmin/seo/create-same-as', 'SeoController@createSameAs');
    Route::post('/ahmdedAbdelsalamAdmin/seo/create-same-as/create', 'SeoController@storeSameAs');
    Route::get('/ahmdedAbdelsalamAdmin/seo/edit-same-as/edit/{id}', 'SeoController@editSameAs');
    Route::patch('/ahmdedAbdelsalamAdmin/seo/edit-same-as/edit/{id}', 'SeoController@updateSameAs');
    Route::delete('/ahmdedAbdelsalamAdmin/seo/delete-same-as/{id}', 'SeoController@deleteSameAs');
    /*-------- Forms   --------*/
    Route::get('/ahmdedAbdelsalamAdmin/seo/form', 'SeoController@form');
    Route::get('/ahmdedAbdelsalamAdmin/seo/form/edit/{id}', 'SeoController@editForm');
    Route::patch('/ahmdedAbdelsalamAdmin/seo/form/edit/{id}', 'SeoController@updateForm');



});




Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
