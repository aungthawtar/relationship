<?php

use Illuminate\Support\Facades\Route;

// Admin Route
Route::group(['prefix'=>'admin'],function(){
    Route::get('/post','Admin\PostController@index');
    Route::get('/post/create','Admin\PostController@create');
    Route::post('/post/create','Admin\PostController@store');
    Route::get('/post/{id}/edit','Admin\PostController@edit');
    Route::post('/post/{id}/edit','Admin\PostController@update');
    Route::get('/post/{id}/delete','Admin\PostController@destroy');

    Route::get('/post/drift','Admin\PostController@drift');
    Route::get('/post/{id}/restore','Admin\PostController@restore');
    Route::get('/post/{id}/fdelete','Admin\PostController@fdelete');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::post('/category/create','Admin\CategoryController@store');
    Route::get('/category/{id}/edit','Admin\CategoryController@edit');
    Route::post('/category/{id}/edit','Admin\CategoryController@update');
    Route::get('/category/{id}/delete','Admin\CategoryController@destroy');
});

// User Route

Route::get('/post','User\UiController@index');

Route::get('/post/{id}','User\UiController@detail');

Route::post('/post/{id}/like','LikeDislikeController@like');
Route::post('/post/{id}/dislike','LikeDislikeController@dislike');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
