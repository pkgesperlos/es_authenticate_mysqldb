<?php

namespace Esperlos\Esauthentication\Lib;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CreateToken
{
    public static function token(Request $request)
    {
        $response = Http::asForm()->post(env('APP_URL').'/oauth/token', [
            'grant_type' => config("esauthentication.client.GRANT_TYPE"),
            'client_id' =>  config("esauthentication.client.CLIENT_ID"),
            'client_secret' => config("esauthentication.client.SECRET_CLIENT_ID"),
            'scope' => config("esauthentication.client.SCOPE"),
            'username' => $request->get(config("esauthentication.client.USER_NAME")),
            'password' => $request->get("password"),
        ]);

        return $response;
    }
}

?>
