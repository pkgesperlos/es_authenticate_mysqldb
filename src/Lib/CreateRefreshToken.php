<?php

namespace Esperlos\Esauthentication\Lib;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CreateRefreshToken
{
    public static function token(Request $request)
    {
        $response = Http::asForm()->post(env('APP_URL').'/oauth/token', [
            'grant_type' => config("esauthentication.client.GRANT_REFRESH_TOKEN"),
            'refresh_token' => $request->get("refresh_token"),
            'client_id' =>  config("esauthentication.client.CLIENT_ID"),
            'client_secret' => config("esauthentication.client.SECRET_CLIENT_ID"),
            'scope' => config("esauthentication.client.SCOPE"),
        ]);

        return $response;
    }
}

?>
