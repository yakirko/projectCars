<?php

Route::prefix('user')->group(function(){

    // login
    Route::get('signin', 'UserController@getSignin');  //form HTML  -  view
    Route::post('signin', 'UserController@postSignin');  //send form to server

    // register
    Route::get('signup', 'UserController@getSignup');   //form HTML  -  view
    Route::post('signup', 'UserController@postSignup');  //send form to server

    Route::get('logout', 'UserController@logout');
});

