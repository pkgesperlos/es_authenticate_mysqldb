<?php

namespace Esperlos98\Esauthentication\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Esperlos98\Esauthentication\Lib\CreateToken;
use Esperlos98\Esauthentication\Repository\Validate\ValidateRequest;
use Esperlos98\Esauthentication\Lib\Config\FiledCreateUser;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validate = resolve(ValidateRequest::class)
            ->validate($request,config("esauthentication.rules.Register"),config("esauthentication.massages"));
        if($validate){
            return $validate;
        };

        $fileds = new FiledCreateUser($request);
        $user = User::create($fileds->fileds);
        $user->save();

        $token = CreateToken::token($request);

        return $token;
    }
}

?>
