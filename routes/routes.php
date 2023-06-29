<?php

// Routes for block.

// Guard routes for block
Route::prefix('{guard}/block')->group(function () {

    Route::patch('block/workflow/{block}/{transition}', 'BlockWorkflowController');
    Route::resource('block', 'BlockResourceController');
});

// Guard routes for category
Route::prefix('{guard}/block')->group(function () {

    Route::resource('category', 'CategoryResourceController');
});



// Public routes for block
Route::get('blocks/', 'BlockPublicController@index');
Route::get('block/{slug?}', 'BlockPublicController@show');
