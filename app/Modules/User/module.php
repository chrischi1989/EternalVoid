<?php
Route::group([
    'namespace'  => 'EternalVoid\User\UI\Web\Handlers',
    'middleware' => [
        'web'
    ],
], __DIR__ . '/UI/Web/routes.php');
