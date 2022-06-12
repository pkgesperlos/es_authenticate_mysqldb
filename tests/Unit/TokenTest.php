<?php

namespace Esperlos98\Esauthentication\tests\Unit;

use Tests\TestCase;
use Esperlos98\Esauthentication\Lib\CreateToken;
use App\Models\User;
use Illuminate\Http\Request;

class CreateTokenTest extends TestCase
{

    public function test_create_token()
    {
        $user = User::factory()->create();
        $request = new Request();
        $request->merge(["email"=>$user->email,"password"=>"password"]);
        $response = CreateToken::token($request);

        return $this->assertTrue($response->status() == 200);
    }

    public function test_create_token_defeat()
    {
        $request = new Request();
        $request->merge(["email"=>"mistakeemail@gmail.com","password"=>"password"]);
        $response = CreateToken::token($request);

        return $this->assertTrue($response->status() == 400);
    }
}
