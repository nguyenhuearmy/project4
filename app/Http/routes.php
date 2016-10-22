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
Route::group(['middware' => 'web'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
});
    
Route::group(['middware' => 'web'], function(){
    Route::auth();
    
    Route::get('/change', 'UsersController@changePassword');
    Route::post('change', 'UsersController@change');
    Route::get('/profile', 'UsersController@profile');
    Route::post('profile', 'UsersController@setprofile');
});
    

    
