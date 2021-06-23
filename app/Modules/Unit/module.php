<?php
Route::group([
    'namespace'  => 'EternalVoid\Research\UI\Web\Handlers',
    'middleware' => [
        'web'
    ]
], __DIR__ . '/UI/Web/routes.php');
