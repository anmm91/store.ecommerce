<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
            // dashboard
            Route::get('/', 'DashboardController@index')->name('admin.home');
            Route::post('logout', 'LoginController@logout')->name('admin.logout');

            Route::group(['prefix' => 'setting'], function () {
                //shipping method
                Route::get('shipping-method/{type}', 'SettingController@editShippingMethod')->name('edit.shippings.methods');
                Route::post('shipping-method/{id}', 'SettingController@updateShippingMethod')->name('update.shippings.methods');
            });

            //edit profile
            Route::group(['prefix' => 'profile'], function () {
                //shipping method
                Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
                Route::post('update', 'ProfileController@updateProfile')->name('update.profile');
            });

            ########################################## main categories ###########
            Route::group(['prefix' => 'main-categories'], function () {

                Route::get('/', 'MainCategoriesController@index')->name('index.main_categories');
                Route::get('create', 'MainCategoriesController@create')->name('create.main_categories');
                Route::post('store', 'MainCategoriesController@store')->name('store.main_categories');
                Route::get('edit/{id}', 'MainCategoriesController@edit')->name('edit.main_categories');
                Route::post('update/{id}', 'MainCategoriesController@update')->name('update.main_categories');
                Route::post('delete/{id}', 'MainCategoriesController@delete')->name('delete.main_categories');
                Route::get('activate/{id}', 'MainCategoriesController@activate')->name('activate.main_categories');
            });

             ########################################## sub categories ###########
            Route::group(['prefix' => 'sub-categories'], function () {

                Route::get('/', 'SubCategoriesController@index')->name('index.sub_categories');
                Route::get('create', 'SubCategoriesController@create')->name('create.sub_categories');
                Route::post('store', 'SubCategoriesController@store')->name('store.sub_categories');
                Route::get('edit/{id}', 'SubCategoriesController@edit')->name('edit.sub_categories');
                Route::post('update/{id}', 'SubCategoriesController@update')->name('update.sub_categories');
                Route::post('delete/{id}', 'SubCategoriesController@delete')->name('delete.sub_categories');
                Route::get('activate/{id}', 'SubCategoriesController@activate')->name('activate.sub_categories');
                Route::post('convert/{id}', 'SubCategoriesController@convertToParentOrChild')->name('type.sub_categories');
            });
        });


        // guest befor make login
        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'guest:admin'], function () {

            Route::get('/login', 'LoginController@getLogin')->name('admin.login');
            Route::post('/login', 'LoginController@postLogin')->name('admin.post.login');
            Route::get('/forgot/password', 'ForgotPasswordController@getForgotPassword')->name('admin.forgot');
            Route::post('/forgot/password', 'ForgotPasswordController@postForgotPassword')->name('admin.post.forgot');
            Route::get('/forgot/password/{token}', 'ForgotPasswordController@getResetPassword')->name('admin.reset');
            Route::post('/forgot/password/{token}', 'ForgotPasswordController@postResetPassword')->name('admin.post.reset');
        });
    }
);
