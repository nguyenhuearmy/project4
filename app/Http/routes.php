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
    
    Route::get('/category/all', 'CategoriesController@show');
    Route::get('/category', 'CategoriesController@index');
    Route::get('/category/{id}', 'CategoriesController@category');
    Route::get('category/delete/{id}', 'CategoriesController@destroy');
    
    // Route File
    Route::get('file', 'FilesController@index');
    Route::get('file/add', 'FilesController@create');
    Route::post('file', 'FilesController@store');
    Route::get('file/download/{id}', 'FilesController@download');
    Route::get('file/detail/{id}', 'FilesController@detail');
    Route::get('file/edit/{id}', 'FilesController@edit');
    Route::post('file/edit', 'FilesController@update');
    Route::get('file/myfile', 'FilesController@myfile');
    Route::get('file/delete/{id}', 'FilesController@destroy');
    
    // Route Comment
    Route::post('comment', 'CommentsController@create');
    
    //Route Like
    Route::post('like', 'FilesController@like');
    Route::post('dislike', 'FilesController@dislike');
});
    

    
