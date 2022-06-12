<?php

use Illuminate\Http\Request;

return [
    "client" => [
        "GRANT_TYPE" => env("GRANT_TYPE","password"),
        "GRANT_REFRESH_TOKEN" => env("GRANT_REFRESH_TOKEN","refresh_token"),
        "CLIENT_ID" => env("CLIENT_ID"),
        "SECRET_CLIENT_ID" => env("SECRET_CLIENT_ID"),
        "SCOPE" => env("SCOPE",""),
        "USER_NAME"=> env("USER_NAME","email"),
    ],
    "rules" => [
        "Register" => [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ],
        "Login" => [
            'email' => 'required|email',
            'password' => 'required',
        ],
    ],
    "massages" => [
        "required" => 601,
        "confirmed" => 602,
        "min" => 603,
        "email" => 604,
        "unique" => 605
    ],
    "userFileds" => [
        "name" => "name",
        "email" => "email",
        "password" => "password",
    ],

];
