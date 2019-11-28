<?php

Route::middleware(['admin_guard'])->group(function () {
    

    Route::prefix('cms')->group(function(){

        Route::get('dashboard','CmsController@dashboard');
        
        Route::Resource('categories','CategoriesController');
        Route::Resource('products','Cms_products_controller');
        Route::Resource('orders','CmsOrders');

    
    });

});

  // Route::get('categories','SearchController');