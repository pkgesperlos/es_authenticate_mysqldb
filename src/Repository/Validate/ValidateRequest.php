<?php

namespace Esperlos\Esauthentication\Repository\Validate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequest
{
    public function validate(Request $request,array $rules,array $massages){
        $validated = Validator::make($request->all(),$rules,$massages);

        if ($validated->fails()) {
            return response()->json($validated->getMessageBag(), Response::HTTP_BAD_REQUEST);
        }
    }
}

?>