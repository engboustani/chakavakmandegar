<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/recaptcha', function(){
        return captcha_src('flat');
    });
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'prefix' => 'payment'
], function () {
    Route::get('payir/verify', 'PaymentController@payir_verify');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('payir', 'PaymentController@payir');
    });  
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('info', 'UserController@getInfo');
        Route::get('list', 'UserController@getList');
    });  
});

Route::group([
    'prefix' => 'event'
], function () {
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('list', 'EventController@getList');
        Route::get('{id}', 'EventController@getEvent');
        Route::post('new', 'EventController@newEvent');
        Route::put('update', 'EventController@updateEvent');
        Route::post('image-upload', 'GalleryController@imageUpload');
        Route::delete('delete', 'EventController@deleteEvent');
    });  
});

Route::group([
    'prefix' => 'eventtime'
], function () {
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('list', 'EventtimeController@getList');
    });  
});