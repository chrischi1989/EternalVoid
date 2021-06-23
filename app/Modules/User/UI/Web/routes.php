<?php
Route::post('register', RegisterHandler::class)->name('user-register');
Route::post('login', LoginHandler::class)->name('user-login');
