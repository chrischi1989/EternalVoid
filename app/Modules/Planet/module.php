<?php
Route::group([
    'namespace'  => 'EternalVoid\Planet\UI\Web\Handlers',
    'middleware' => [
        'web',
        'auth',
        'game'
    ]
], __DIR__ . '/UI/Web/routes.php');
