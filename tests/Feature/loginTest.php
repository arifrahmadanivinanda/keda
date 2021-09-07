<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/auth/login', ['email' => 'customer@gmail.com','password' => 'dummydummy']);

        $response->assertStatus(200);
    }
}
