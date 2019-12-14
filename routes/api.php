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
        return response()->json([
            'status_code' => '200',
            'message' => 'created succeed',
            'data' => app('captcha')->create('flat', true)
        ]);
    });
  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'prefix' => 'payment'
], function () {
    Route::get('payir/verify', 'PaymentController@payir_verify');
    Route::get('factor/{id_factor}', 'PaymentController@payirVerifyFactor');
    Route::get('course/{id_course}', 'PaymentController@payirVerifyCourse');
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('getLatest', 'PaymentController@getLast5');
        Route::get('list', 'PaymentController@getList');
    });  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::post('payir', 'PaymentController@payir');
        Route::get('listUser', 'PaymentController@getListUser');
    });  
});

Route::group([
    'prefix' => 'charge'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('getLatest', 'ChargeController@getLast5');
        Route::get('list', 'ChargeController@getList');
    });  
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'UserController@getList');
    });  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::get('info', 'UserController@getInfo');
    });  
});

Route::group([
    'prefix' => 'event'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'EventController@getList');
        Route::get('{id}', 'EventController@getEvent');
        Route::get('title/{id}', 'EventController@getEventTitle');
        Route::post('new', 'EventController@newEvent');
        Route::put('update', 'EventController@updateEvent');
        Route::delete('delete', 'EventController@deleteEvent');
    });  
});

Route::group([
    'prefix' => 'eventtime'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'EventtimeController@getList');
        Route::get('{id}', 'EventtimeController@getEventtime');
        Route::get('edit/{id}', 'EventtimeController@getEventtimeEdit');
        Route::post('new', 'EventtimeController@new');
        Route::put('update', 'EventtimeController@update');
    });  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
    });  
    Route::get('info/{id}', 'EventtimeController@getEventtimeInfo');
});

Route::group([
    'prefix' => 'ticket'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::get('listUser', 'TicketController@getListUser');
        Route::post('deleteUser', 'TicketController@deleteUser');
    });  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'TicketController@getList');
        Route::get('{id}', 'TicketController@get');
        Route::post('new', 'TicketController@new');
        Route::put('update', 'TicketController@update');
        Route::delete('delete', 'TicketController@delete');
    });  
});

Route::group([
    'prefix' => 'post'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'PostController@getList');
        Route::get('{id}', 'PostController@get');
        Route::post('new', 'PostController@new');
        Route::put('update', 'PostController@update');
        Route::delete('delete', 'PostController@delete');
    });  
});

Route::group([
    'prefix' => 'page'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'PageController@getList');
        Route::get('{id}', 'PageController@get');
        Route::post('new', 'PageController@new');
        Route::put('update', 'PageController@update');
        Route::delete('delete', 'PageController@delete');
    });  
});

Route::group([
    'prefix' => 'seat'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('eventtime/{eventtime_id}', 'SeatController@getSeatList');
        Route::get('{eventtime_id}/{number}', 'SeatController@getSeat');
        Route::get('info/{eventtime_id}/{number}', 'SeatController@getSeatInfo');
        Route::get('setting', 'SeatController@getSeatSettingList');
    });  
});

Route::group([
    'prefix' => 'shop'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::post('pay', 'ShopController@payFactor');
        Route::post('make', 'ShopController@makeFactor');
        Route::post('factor', 'ShopController@getFactor');
        Route::get('seats/{id}', 'ShopController@getSeats');
    });  
});

Route::group([
    'prefix' => 'course'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'CourseController@getList');
        Route::get('{id}', 'CourseController@get');
        Route::post('new', 'CourseController@new');
        Route::put('update', 'CourseController@update');
        Route::delete('delete', 'CourseController@delete');
    });  
    Route::group([
        'middleware' => ['auth:api','role:owner|admin|auther|client']
    ], function() {
        Route::post('signup', 'CourseController@signupCourse');
        Route::get('info/{id}', 'CourseController@info');
    });  
});

Route::group([
    'prefix' => 'media'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::post('image-upload', 'GalleryController@imageUpload');
    });  
});

Route::group([
    'prefix' => 'gallery'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('list', 'GalleryController@getList');
    });  
});

Route::group([
    'prefix' => 'setting'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::put('salon', 'SettingController@putSalon');
    });  
});

Route::group([
    'prefix' => 'dashboard'
], function () {
    Route::group([
        'middleware' => ['auth:api','role:owner|admin']
    ], function() {
        Route::get('listLastMonthPayments', 'DashboardController@getLastMonthPayments');
        Route::get('dashboardInfo', 'DashboardController@dashboardInfo');
    });  
});
