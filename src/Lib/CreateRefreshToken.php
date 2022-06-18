<?php

namespace Esperlos98\Esauthentication\Lib;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CreateRefreshToken
{
    public static function token(Request $request){
        $request = Request::create('oauth/token', 'POST',[
            'grant_type' => config("esauthentication.client.GRANT_REFRESH_TOKEN"),
            'refresh_token' => $request->get("refresh_token"),
            'client_id' =>  config("esauthentication.client.CLIENT_ID"),
            'client_secret' => config("esauthentication.client.CLIENT_SECRET"),
            'scope' => config("esauthentication.client.SCOPE"),
        ]);

        $response = app()->handle($request);
        $response = json_decode($response->getContent(), true);

        return $response;
    }
}

?>
