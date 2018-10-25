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

    /**
     * @test
     */
    public function it_welcome_users_with_nickname() {
        $this->get('saludo/bryan/BryanEdu')
            ->assertStatus(200)
            ->assertSee("Bienvenido Bryan, tu apodo es BryanEdu");
    }
}
