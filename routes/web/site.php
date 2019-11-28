<?php

Route::get('/', 'pagesController@home');
Route::get('{url}', 'pagesController@content');


