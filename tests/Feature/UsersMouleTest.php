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
            ->assertSee("Crear usuario");
    }

    /**
     * @test
     */

    function it_displays_a_404_error_if_the_is_not_found() {
        $this->get('usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /**
     * @test
     */

    function it_creates_a_new_user() {

        $this->post('/usuarios/', [
            'name'=> 'Eduardo',
            'email'=> 'eduardo@gmail.com',
            'password'=> '123456'
        ])->assertRedirect('usuarios');

        // comprueba en la base de datos que se ha guardado un usuario
        // con la contraseña correcta
        //assertDatabaseHas --> otra opcion

        $this->assertCredentials([
            'name' => 'Eduardo',
            'email' => 'eduardo@gmail.com',
            'password'=> '123456'
        ]);
    }


    /**
     * @test
     */

    function the_name_is_required() {

        $this->from('usuarios/nuevo')
        ->post('/usuarios/', [
            'name' => '',
            'email'=> 'bryan@gmail.com',
            'password'=> '123456'
        ])->assertRedirect('usuarios/nuevo')
            -> assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']); // espera que exista un mensaje de error con el campo nombre


        $this->assertEquals(0, User::count());


//        $this-> assertDatabaseMissing('users', [
//            'email' => 'bryan@gmail.com'
//        ]);

    }

    /**
     * @test
     */

    function the_email_is_required() {

        $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
                'name' => 'Bryan',
                'email'=> '',
                'password'=> '123456'
            ])->assertRedirect('usuarios/nuevo')
            -> assertSessionHasErrors(['email' => 'El campo email es obligatorio']);


        $this->assertEquals(0, User::count());

    }

    /**
     * @test
     */

    function the_password_is_required() {

        $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
                'name' => 'Bryan',
                'email'=> 'bryan@gmail.com',
                'password'=> ''
            ])->assertRedirect('usuarios/nuevo')
            -> assertSessionHasErrors(['password' => 'El campo password es obligatorio']);


        $this->assertEquals(0, User::count());

    }


    /**
     * @test
     */

    function the_email_must_be_valid() {

        $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
                'name' => 'Bryan',
                'email'=> 'correo-no-valido',
                'password'=> '123456'
            ])->assertRedirect('usuarios/nuevo')
            -> assertSessionHasErrors(['email']);


        $this->assertEquals(0, User::count());
    }


    /**
     * @test
     */

    function the_email_must_be_unique() {

        factory(User::class)->create([
            'email'=>'bryan@gmail.com'
        ]);

        $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
                'name' => 'Bryan',
                'email'=> 'bryan@gmail.com',
                'password'=> '123456'
            ])->assertRedirect('usuarios/nuevo')
            -> assertSessionHasErrors(['email']);


        $this->assertEquals(1, User::count());

    }

}
