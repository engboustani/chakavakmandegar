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
use Illuminate\Http\Request;

Route::get('', 'ViewController@index');
Route::get('studio', 'ViewController@studio');
Route::get('pelato', 'ViewController@pelato');
Route::get('courses', 'ViewController@courses');
Route::get('posts', 'ViewController@posts');
Route::get('posts/{category}', 'ViewController@postsCategory');
Route::get('shows', 'ViewController@shows');
Route::get('contect-us', 'ViewController@contectus');
Route::get('rules', 'ViewController@rules');
Route::get('userlogin', 'ViewController@login');
Route::get('howto', 'ViewController@howto');
Route::get('tickets', 'ViewController@tickets');
Route::get('payments', 'ViewController@payments');
Route::post('printticket', 'ViewController@printticket');

Route::group([
    'prefix' => 'admin',
    // 'middleware' => 'auth:admin'
], function () {
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('', function() {
        return view('admin/dashboard');
    });
    Route::get('users', function() {
        return view('admin/users');
    });
    Route::get('events', function() {
        return view('admin/events');
    });
    Route::get('event/new', function() {
        return view('admin/event', ['id' => 0]);
    });
    Route::get('event/{id}', function($id) {
        return view('admin/event', ['id' => $id]);
    });
    Route::get('eventtimes', function() {
        return view('admin/eventtimes');
    });
    Route::get('eventtime/new', function(Request $request) {
        $event_id = $request->input('for');
        return view('admin/eventtime', ['event_id' => $event_id]);
    });
    Route::get('eventtime/{id}', function($id) {
        return view('admin/eventtime', ['id' => $id]);
    });
    Route::get('posts', function() {
        return view('admin/posts');
    });
    Route::get('post/new', function() {
        return view('admin/post', ['id' => 0]);
    });
    Route::get('post/{id}', function($id) {
        return view('admin/post', ['id' => $id]);
    });
    Route::get('page/new', function() {
        return view('admin/page', ['id' => 0]);
    });
    Route::get('page/{id}', function($id) {
        return view('admin/page', ['id' => $id]);
    });
    Route::get('payments', function() {
        return view('admin/payments');
    });
    Route::get('tickets', function() {
        return view('admin/tickets');
    });
    Route::get('courses', function() {
        return view('admin/courses');
    });
    Route::get('course/new', function() {
        return view('admin/course', ['id' => 0]);
    });
    Route::get('course/{id}', function($id) {
        return view('admin/course', ['id' => $id]);
    });
    Route::get('setting/salon', function() {
        return view('admin/settingsalon');
    });
        
});



Route::get('event/{id}', 'ViewController@event');

Route::get('signup', 'ViewController@signup');

Route::get('shop/{id}', 'ShopController@selectSeat');
Route::get('payfactor/{id}', 'ShopController@payFactorView')->where('id', '[0-9]+');
Route::get('paymentfailed', 'ViewController@paymentfailed');
Route::get('shop/factor/{id}/print', 'ShopController@printFactor');

Route::get('course/{id}', 'ViewController@course');
Route::get('post/{id}', 'ViewController@post');

Route::get('howauth', function() {
    return dd(Auth::guard('admin')->user());
});

Route::get('search', 'ViewController@search')->name('search');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
