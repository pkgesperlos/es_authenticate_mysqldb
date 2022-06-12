<?php

namespace Esperlos98\Esauthentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Esperlos98\Esauthentication\Lib\CreateRefreshToken;

class RefreshTokenController extends Controller
{
    public function refreshToken(Request $request)
    {
        $token = CreateRefreshToken::token($request);

        return  $token;
    }

}

?>
