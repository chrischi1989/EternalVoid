<?php
Route::group([
    'namespace'  => 'EternalVoid\Report\UI\Web\Handlers',
    'middleware' => [
        'web'
    ]
], __DIR__ . '/UI/Web/routes.php');
