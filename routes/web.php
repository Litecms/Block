<?php

// Resource routes  for block
Route::group(['prefix' => '{guard}/block'], function () {
    Route::resource('block', 'BlockResourceController');
    Route::resource('category', 'CategoryResourceController');
});

if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}/{guard}/block',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            Route::resource('block', 'BlockResourceController');
            Route::resource('category', 'CategoryResourceController');
        }
    );
}
