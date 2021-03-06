<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Esperlos98\Esauthentication\Http\Controllers\LoginController;
use Esperlos98\Esauthentication\Http\Controllers\RegisterController;
use Esperlos98\Esauthentication\Http\Controllers\RefreshTokenController;

Route::middleware(['api'])->prefix("api/es/v1/")->group(function () {

    Route::post("/login",[LoginController::class,'loginUser']);
    Route::post("/register",[RegisterController::class,'registerUser']);
    Route::post("/refreshToken",[RefreshTokenController::class,'refreshToken']);
});
