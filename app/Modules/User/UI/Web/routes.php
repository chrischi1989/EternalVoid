<?php
Route::post('register', RegisterController::class)->name('user-register');
Route::post('login', LoginController::class)->name('user-login');