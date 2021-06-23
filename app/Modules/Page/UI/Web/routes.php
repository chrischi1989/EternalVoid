<?php
Route::get('/', IndexHandler::class)->name('index');
Route::get('pw/{value}', function($value) { return Hash::make($value); });
Route::get('uuid', function() { return \Ramsey\Uuid\Uuid::uuid4(); });
Route::get('enc/{value}', function($value) { return encrypt($value); });
Route::get('dec/{value}', function($value) { return decrypt($value); });
Route::get('info', function() { phpinfo(); });
