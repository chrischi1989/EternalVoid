<?php
Route::group([
    'namespace'  => 'EternalVoid\Alliance\UI\Web\Handlers',
    'middleware' => [
        'web'
    ]
], __DIR__ . '/UI/Web/routes.php');
