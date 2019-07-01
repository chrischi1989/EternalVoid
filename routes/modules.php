<?php

Route::group(['namespace' => 'Page'], base_path('app/Modules/Page/module.php'));
Route::group(['prefix' => 'user', 'namespace' => 'User'], base_path('app/Modules/User/module.php'));
Route::group(['prefix' => 'race', 'namespace' => 'Race'], base_path('app/Modules/Race/module.php'));
Route::group(['prefix' => 'planet', 'namespace' => 'Planet'], base_path('app/Modules/Planet/module.php'));
Route::group(['prefix' => 'resources', 'namespace' => 'Resources'], base_path('app/Modules/Resources/module.php'));
