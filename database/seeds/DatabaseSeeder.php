<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->truncateTables([
            'users',
            'professions'
        ]);

        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);

    }

    protected function truncateTables(array $tables) {

        // Se desactiva la revision de llaves foraneas para que no tire errores
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");

        //Con esto eliminamos los valores de la  professions
        foreach ($tables as $table) {

            DB::table($table)->truncate();

        }


        //Se vuelve a activar la revision de claves foraneas
        DB::statement("SET FOREIGN_KEY_CHECKS = 1");

    }
}
