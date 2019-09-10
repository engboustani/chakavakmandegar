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

Route::get('/', 'ViewController@index');

Route::group([
    'prefix' => 'admin'
], function () {
    Route::get('/', function() {
        return view('admin/dashboard');
    });
    Route::get('/users', function() {
        return view('admin/users');
    });
    Route::get('/events', function() {
        return view('admin/events');
    });
    Route::get('/event/new', function() {
        return view('admin/event', ['id' => 0]);
    });
    Route::get('/event/{id}', function($id) {
        return view('admin/event', ['id' => $id]);
    });
    Route::get('/eventtimes', function() {
        return view('admin/eventtimes');
    });
    Route::get('/eventtime/new', function() {
        return view('admin/eventtime', ['id' => 0]);
    });
    Route::get('/eventtime/{id}', function($id) {
        return view('admin/eventtime', ['id' => $id]);
    });
});



Route::get('/event/{id}', 'ViewController@event');

Route::get('/signup', 'ViewController@signup');

Route::get('/shop/{id}', 'ShopController@selectSeat');

Route::any('/captcha-test', function() {
    if (request()->getMethod() == 'POST') {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});

Auth::routes();