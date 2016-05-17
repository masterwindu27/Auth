<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::auth();
Route::get('/home', 'HomeController@index');

Route::get('admin','MojAuth\AdminController@index');

Route::get('login', function(){
   return view('auth.login');
});

Route::get('register', function(){
    return view('auth.register');
});

Route::post('login', 'MojAuth\AdminController@proba');

Route::post('register', 'MojAuth\AdminController@register');