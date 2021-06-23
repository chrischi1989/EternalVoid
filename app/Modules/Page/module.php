<?php
Route::group([
    'namespace'  => 'EternalVoid\Page\UI\Web\Handlers',
    'middleware' => [
        'web'
    ]
], __DIR__ . '/UI/Web/routes.php');
