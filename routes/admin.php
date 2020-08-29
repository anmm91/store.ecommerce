<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


        Route::group(['prefix'=>'admin','namespace' => 'Dashboard','middleware'=>'auth:admin'], function () {
            // dashboard
            Route::get('/','DashboardController@index')->name('admin.home');


            Route::group(['prefix' => 'setting'], function () {
                 //shipping method
                 Route::get('shipping-method/{type}','SettingController@editShippingMethod')->name('edit.shippings.methods');
                 Route::post('shipping-method/{id}','SettingController@updateShippingMethod')->name('update.shippings.methods');
            });
        });


    });

    // guest befor make login
Route::group(['prefix'=>'admin','namespace' => 'Dashboard','middleware'=>'guest:admin'], function () {

    Route::get('/login','LoginController@getLogin')->name('admin.login');
    Route::post('/login','LoginController@postLogin')->name('admin.post.login');
    Route::get('/forgot/password','ForgotPasswordController@getForgotPassword')->name('admin.forgot');
    Route::post('/forgot/password','ForgotPasswordController@postForgotPassword')->name('admin.post.forgot');
    Route::get('/forgot/password/{token}','ForgotPasswordController@getResetPassword')->name('admin.reset');
    Route::post('/forgot/password/{token}','ForgotPasswordController@postResetPassword')->name('admin.post.reset');
});

