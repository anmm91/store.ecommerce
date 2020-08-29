<?php

use Illuminate\Support\Facades\Route;

// use prefix admin on all routes of this file

Route::group(['namespace' => 'Dashboard','middleware'=>'auth:admin'], function () {

    Route::get('/','DashboardController@index')->name('admin.home');
});
Route::group(['namespace' => 'Dashboard','middleware'=>'guest:admin'], function () {

    Route::get('/login','LoginController@getLogin')->name('admin.login');
    Route::post('/login','LoginController@postLogin')->name('admin.post.login');
    Route::get('/forgot/password','ForgotPasswordController@getForgotPassword')->name('admin.forgot');
    Route::post('/forgot/password','ForgotPasswordController@postForgotPassword')->name('admin.post.forgot');
    Route::get('/forgot/password/{token}','ForgotPasswordController@getResetPassword')->name('admin.reset');
    Route::post('/forgot/password/{token}','ForgotPasswordController@postResetPassword')->name('admin.post.reset');
});

