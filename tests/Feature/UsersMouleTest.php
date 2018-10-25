<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersMouleTest extends TestCase
{
    /**
     * @test
     */
    function it_loads_the_users_list_page()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee("Joel")
            ->assertSee("Ellie")
            ->assertSee("Byron");


    }

    /**
     * @test
     */
    function it_loads_the_users_detail_page() {
        $this->get('/usuarios/5')
            ->assertStatus(200)
            ->assertSee("Mostrando detalle del usuario: 5");
    }

    /**
     * @test
     */

    function it_loads_the_new_users_page() {
        $this->get('/usuarios/nuevo')
            -> assertStatus(200)
            ->assertSee("Crear nuevo usuario");
    }

}
