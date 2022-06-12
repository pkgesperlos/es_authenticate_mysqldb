<?php

namespace Esperlos\Esauthentication\tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterTest extends TestCase
{
    use WithFaker;

    public function test_register_successful()
    {
        $response = $this->json("post",env('APP_URL')."/es/api/v1/register",
        [
            "email"=>$this->faker()->email,
            "name"=>$this->faker()->name,
            "password_confirmation"=>"password",
            "password"=>"password"
        ]);

        return $this->assertTrue($response->status() == 200);
    }

    public function test_register_defeat()
    {
        $response = $this->json("post",env('APP_URL')."/es/api/v1/register",
        [
            "email"=>$this->faker->email,
            "name"=>$this->faker->name,
            "password_confirmation"=>"mistakepassword",
            "password"=>"password"
        ]);

        return $this->assertTrue($response->status() == 400);
    }
}

?>
