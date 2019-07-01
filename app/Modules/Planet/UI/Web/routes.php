<?php
Route::group([
    'middleware' => [
        'auth',
        'game'
    ]
], function() {
    Route::get('/', PlanetController::class)->name('planet');
});
