<?php

namespace Esperlos98\Esauthentication\Lib;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CreateToken
{
    public static function token(Request $request){
        $request = Request::create('oauth/token', 'POST',[
            'grant_type' => config("esauthentication.client.GRANT_TYPE"),
            'client_id' =>  config("esauthentication.client.CLIENT_ID"),
            'client_secret' => config("esauthentication.client.CLIENT_SECRET"),
            'scope' => config("esauthentication.client.SCOPE"),
            'username' => $request->get(config("esauthentication.client.USER_NAME")),
            'password' => $request->get("password"),
        ]);

        $response = app()->handle($request);
        $response = json_decode($response->getContent(), true);

        return $response;
    }
}

?>
