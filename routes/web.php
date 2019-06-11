<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function () {
    /**
     * Category
     */
    Route::group(['prefix' => '/categories'], function() {
        Route::get('/', 'Categories\CategoryController@index')->name('category.index');
    });
});