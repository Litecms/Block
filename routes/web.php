<?php

// Resource routes  for block
Route::group(['prefix' => set_route_guard('web') . '/block'], function () {
    Route::resource('block', 'BlockResourceController');
    Route::resource('category', 'CategoryResourceController');
});