<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	$user = User::find(1);
	var_dump($user->posts()->orderBy('created_at', 'desc')->take(5)->get());
}));

// Login & Logout
Route::get('login', array('as' => 'login', 'uses' => 'LoginController@getLogin'));
Route::post('login', array('uses' => 'LoginController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

// Registration
Route::get('register', array('as' => 'register', 'uses' => 'RegistrationController@getRegister'));
Route::post('register', array('uses' => 'RegistrationController@postRegister'));

Route::resource('post', 'PostController');
Route::resource('post/{post_id}/reply', 'ReplyController');

// Account Settings
Route::get('settings/account', array('as' => 'account_settings', 'uses' => 'AccountController@getAccount'));
Route::post('settings/account', array('uses' => 'AccountController@updateAccount'));

// Profile Settings
Route::get('settings/profile', array('as' => 'profile_settings', 'uses' => 'ProfileController@getSettings'));
Route::post('settings/profile/', array('uses' => 'ProfileController@getSettings'));

// Public Profile
Route::get('user/{id}', array('as' => 'profile', 'uses' => 'ProfileController@getProfile'));

// Messages
Route::pattern('message', '[0-9]+');
Route::resource('message', 'MessageController');