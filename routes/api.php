<?php

// Admin routes  for block
Route::group(['prefix' => trans_setlocale().'api/v1/admin/blocks'], function () {
    Route::resource('block', 'Litecms\Blocks\Http\Controllers\BlockAdminApiController');
});

// User routes for block
Route::group(['prefix' => trans_setlocale().'api/v1/user/blocks'], function () {
    Route::resource('block', 'Litecms\Blocks\Http\Controllers\BlockUserApiController');
});

// Public routes for block
Route::group(['prefix' => trans_setlocale().'api/v1/blocks'], function () {
    Route::get('/', 'Litecms\Blocks\Http\Controllers\BlockPublicApiController@index');
    Route::get('/{slug?}', 'Litecms\Blocks\Http\Controllers\BlockPublicApiController@show');
});

