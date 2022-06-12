<?php

namespace Esperlos\Esauthentication\tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class RefreshTokenTest extends TestCase
{
    use WithFaker;

    public function test_refresh_token_successful()
    {
        $response = $this->json("post",env('APP_URL')."/es/api/v1/refreshToken",
        [
            "refresh_token"=>Str::random(60),
        ]);

        return $this->assertTrue($response->status() == 200);
    }

    public function test_refrsh_token_defeat()
    {
        $response = $this->json("post",env('APP_URL')."/es/api/v1/refreshToken",
        [
            "refresh_token"=>Str::random(60),
        ]);

        return $response->assertSeeText("The refresh token is invalid");
    }
}

?>
