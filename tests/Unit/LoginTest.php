<?php

namespace Esperlos98\Esauthentication\tests\Unit;

use Tests\TestCase;
use Esperlos98\Esauthentication\Lib\CreateToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class LoginTest extends TestCase
{

    public function test_login_successful(){
        $user = User::factory()->create();
        $response = $this->json("post",env('APP_URL')."/es/api/v1/login",
            ["email"=>$user->email,"password"=>"password"]);
    
        return $this->assertTrue($response->status() == 200);
    }

    public function test_login_defeat(){
        $user = User::factory()->create();
        $response = $this->json("post",env('APP_URL')."/es/api/v1/login",
            ["email"=>$user->email,"password"=>"mistakepassword"]);
            
        return $this->assertFalse($response->status() != 200);
    }
}

?>