<?php

namespace Esperlos98\Esauthentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Esperlos98\Esauthentication\Lib\CreateToken;
use Esperlos98\Esauthentication\Repository\Validate\ValidateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class LoginController extends Controller
{
    public function loginUser(Request $request){
        $validate = resolve(ValidateRequest::class)
            ->validate($request,config("esauthentication.rules.Login"),config("esauthentication.massages"));
        if($validate){
            return $validate;
        };

        $userCheck = Auth::attempt($request->all());
        if($userCheck){
            $userId = $request->user()->id;
            $this->revoked($userId);
        }

        $token = CreateToken::token($request);

        return  $token;
    }

    public function revoked($userId){
        $tokens = DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->get();

        foreach($tokens as $token){
            $tokenRepository = app(TokenRepository::class);
            $refreshTokenRepository = app(RefreshTokenRepository::class);

            $tokenRepository->revokeAccessToken($token->id);
            $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($token->id);
        }
    }

}
