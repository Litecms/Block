<?php

// Web routes  for block.

// Guard routes for block
Route::prefix('{guard}/block')->group(function () {
    Route::resource('block', 'BlockResourceController');
});

// Guard routes for category
Route::prefix('{guard}/block')->group(function () {
    Route::resource('category', 'CategoryResourceController');
});



// Public routes for block
Route::get('blocks/', 'BlockPublicController@index');
Route::get('block/{slug?}', 'BlockPublicController@show');


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for block
            Route::prefix('{guard}/block')->group(function () {
                Route::resource('block', 'BlockResourceController');
            });
            
            // Guard routes for category
            Route::prefix('{guard}/block')->group(function () {
                Route::resource('category', 'CategoryResourceController');
            });
            
            

            // Public routes for block
            Route::get('blocks/', 'BlockPublicController@index');
            Route::get('block/{slug?}', 'BlockPublicController@show');

        }
    );
}