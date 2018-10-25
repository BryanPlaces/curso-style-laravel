<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /**
     * @test
     */
    public function it_welcome_users_without_nickname() {
        $this->get('saludo/bryan')
            ->assertStatus(200)
            ->assertSee("Bienvenido Bryan");
    }
}
