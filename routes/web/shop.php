<?php

Route::prefix('shop')->group(function(){

    Route::get('categories', 'shopController@categories');


    // checkout
    Route::get('remove-item', 'shopController@removeItem');
    Route::get('clear-cart', 'shopController@clearCart');
    Route::get('update-cart', 'shopController@updateCart');
    Route::get('order-now', 'shopController@orderNow');
    Route::get('checkout', 'shopController@checkout');

    // add in shop pages
    Route::get('add-to-cart', 'ShopController@addToCart');

    Route::get('{url}', 'shopController@products');
    Route::get('{curl}/{purl}', 'shopController@item');
});