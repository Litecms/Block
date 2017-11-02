<?php

// Resource routes  for block
Route::group(['prefix' => set_route_guard('web') . '/block'], function () {
    Route::resource('block', 'BlockResourceController');
});

// Public  routes for block
Route::get('blocks/', 'BlockPublicController@index');
Route::get('blocks/{slug?}', 'BlockPublicController@show');

// Resource routes  for category
Route::group(['prefix' => set_route_guard('web') . '/block'], function () {
    Route::resource('category', 'CategoryResourceController');
});
