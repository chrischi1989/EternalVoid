<?php
Route::group([
    'namespace' => 'EternalVoid\Race\UI\Web\Handlers',
    'middleware' => [
        'web'
    ]
], __DIR__ . '/UI/Web/routes.php');
