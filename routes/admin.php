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
            Route::group(['prefix' => 'categories'], function () {

                Route::get('/', 'CategoriesController@index')->name('index.categories');
                Route::get('create', 'CategoriesController@create')->name('create.categories');
                Route::post('store', 'CategoriesController@store')->name('store.categories');
                Route::get('edit/{id}', 'CategoriesController@edit')->name('edit.categories');
                Route::post('update/{id}', 'CategoriesController@update')->name('update.categories');
                Route::post('delete/{id}', 'CategoriesController@delete')->name('delete.categories');
                Route::get('activate/{id}', 'CategoriesController@activate')->name('activate.categories');
            });

             ########################################## sub categories ###########
            // Route::group(['prefix' => 'sub-categories'], function () {

            //     Route::get('/', 'SubCategoriesController@index')->name('index.sub_categories');
            //     Route::get('create', 'SubCategoriesController@create')->name('create.sub_categories');
            //     Route::post('store', 'SubCategoriesController@store')->name('store.sub_categories');
            //     Route::get('edit/{id}', 'SubCategoriesController@edit')->name('edit.sub_categories');
            //     Route::post('update/{id}', 'SubCategoriesController@update')->name('update.sub_categories');
            //     Route::post('delete/{id}', 'SubCategoriesController@delete')->name('delete.sub_categories');
            //     Route::get('activate/{id}', 'SubCategoriesController@activate')->name('activate.sub_categories');
            //     Route::post('convert/{id}', 'SubCategoriesController@convertToParentOrChild')->name('type.sub_categories');
            // });

             ########################################## brands ###########
            Route::group(['prefix' => 'brands'], function () {

                Route::get('/', 'BrandsController@index')->name('index.brands');
                Route::get('create', 'BrandsController@create')->name('create.brands');
                Route::post('store', 'BrandsController@store')->name('store.brands');
                Route::get('edit/{id}', 'BrandsController@edit')->name('edit.brands');
                Route::post('update/{id}', 'BrandsController@update')->name('update.brands');
                Route::post('delete/{id}', 'BrandsController@delete')->name('delete.brands');
                Route::get('activate/{id}', 'BrandsController@activate')->name('activate.brands');
                Route::post('convert/{id}', 'BrandsController@convertToParentOrChild')->name('type.brands');
            });

             ########################################## tags ###########
             Route::group(['prefix' => 'tags'], function () {

                Route::get('/', 'TagsController@index')->name('index.tags');
                Route::get('create', 'TagsController@create')->name('create.tags');
                Route::post('store', 'TagsController@store')->name('store.tags');
                Route::get('edit/{id}', 'TagsController@edit')->name('edit.tags');
                Route::post('update/{id}', 'TagsController@update')->name('update.tags');
                Route::post('delete/{id}', 'TagsController@delete')->name('delete.tags');
                // Route::get('activate/{id}', 'TagsController@activate')->name('activate.tags');
                // Route::post('convert/{id}', 'TagsController@convertToParentOrChild')->name('type.tags');
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
