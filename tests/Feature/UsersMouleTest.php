<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersMouleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    function it_shows_the_users_list()
    {

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee("No hay usuarios registrados");


    }



    /**
     * @test
     */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {

        factory(User::class) -> create([
            'name'=>'Joel'
        ]);

        factory(User::class) -> create([
            'name'=>'Ellie'
        ]);


        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee("Joel")
            ->assertSee("Ellie");

    }

    /**
     * @test
     */
    function it_displays_the_users_details() {

        $user = factory(User::class)->create([
            'name'=>'Bryan Places'
        ]);

        $this->get('/usuarios/'.$user->id)
            ->assertStatus(200)
            ->assertSee('Bryan Places');
    }

    /**
     * @test
     */

    function it_loads_the_new_users_page() {
        $this->get('/usuarios/nuevo')
            -> assertStatus(200)
            ->assertSee("Crear nuevo usuario");
    }

    /**
     * @test
     */

    function it_displays_a_404_error_if_the_is_not_found() {
        $this->get('usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

}
