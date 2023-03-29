<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_pradziosStatusas()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function test_loginStatusas(){

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_registerStatusas(){

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_contactStatusas(){

        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_profileStatusas(){

        $response = $this->get('/profile');

        $response->assertStatus(200);
    }
}
