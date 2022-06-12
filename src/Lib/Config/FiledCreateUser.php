<?php

namespace Esperlos98\Esauthentication\Lib\Config;

use Illuminate\Http\Request;

class FiledCreateUser
{
    public $fileds = [];
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        foreach (config("esauthentication.userFileds") as $userFiled) {
            if ($userFiled == "password") {
                $this->fileds +=  [$userFiled => bcrypt($request->get($userFiled))];
            } else {
                $this->fileds +=  [$userFiled => $request->get($userFiled)];
            }
        }
    }
}
