<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Esperlos\Esauthentication\Http\Controllers\LoginController;
use Esperlos\Esauthentication\Http\Controllers\RegisterController;
use Esperlos\Esauthentication\Http\Controllers\RefreshTokenController;

Route::middleware(['api'])->prefix("es/api/v1/")->group(function () {

    Route::post("/login",[LoginController::class,'loginUser']);
    Route::post("/register",[RegisterController::class,'registerUser']);
    Route::post("/refreshToken",[RefreshTokenController::class,'refreshToken']);
});
