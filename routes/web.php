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
        
        Route::group(['prefix' => '/{category}'], function(){
            Route::get('/listings', 'Listing\ListingController@index')->name('listings.index');
        });
    });
    /**
     * Listings
     */

     Route::group(['prefix' => '/listing', 'namespace' => 'Listing'], function() {
         Route::get('/favourites', 'ListingFavouriteController@index')->name('listings.favourites.index');
        Route::post('/{listing}/favourites', 'ListingFavouriteController@store')->name('listings.favourites.store');
        Route::delete('/{listing}/favourites', 'ListingFavouriteController@destroy')->name('listings.favourites.delete');

        Route::get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');
     });

     Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');
});