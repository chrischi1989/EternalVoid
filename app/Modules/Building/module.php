<?php
Route::group([
    'namespace' => 'EternalVoid\Building\UI\Web\Handlers',
    'middleware' => [
        'web',
        'auth',
        'game'
    ]
], __DIR__ . '/UI/Web/routes.php');
