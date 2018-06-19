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

// AUTH ROUTES
Auth::routes();

// NAVIGATION ROUTES
Route::get('/', function () {return view('index');});
Route::get('/pellets', function () {return view('pellets');});
Route::get('/contact', function () {return view('contact');});
Route::get('/about_us', function () {return view('about_us');});
Route::get('/shop', function () {return view('shop');});

/// API ROUTES ///
// GET
Route::get('users','UserController@index')->middleware('auth');
Route::get('friends','FriendController@index')->middleware('auth');
Route::get('messages','MessageController@index')->middleware('auth');
Route::get('new_notifications','NotificationController@getNewNotifications')->middleware('auth');
Route::get('new_friend_requests','FriendRequestController@getNewFriendRequests')->middleware('auth');
Route::get('notifications','NotificationController@index')->middleware('auth');
Route::get('friend_requests','FriendRequestController@index')->middleware('auth');
// POST
Route::post('messages','MessageController@store')->middleware('auth');
Route::post('friend_requests','FriendRequestController@store')->middleware('auth');
Route::post('accept_friend_request','FriendRequestController@acceptFriendRequest')->middleware('auth');
Route::post('decline_friend_request','FriendRequestController@declineFriendRequest')->middleware('auth');
// PUT
Route::put('check_notifications','NotificationController@checkNotifications')->middleware('auth');
Route::put('check_friend_requests','NotificationController@checkFriendRequests')->middleware('auth');
