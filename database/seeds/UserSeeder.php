<?php

use App\Profession;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        $professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1', ['Desarrollador back-end']);

//        $professionId = DB::table('professions')
//            ->where('title', 'Desarrollador back-end')
//            ->value('id');

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');



        User::create([
//        DB::table('users')->insert([
            'name' => 'veronica jaqueline',
            'email' => 'veronica@gmail.com',
            'password' => bcrypt('vero'),
            'profession_id' => $professionId,
            'is_admin'=> true,
        ]);

        // Se crea un usuario con valores aleatorios salvo profession_id
        factory(User::class)->create([
            'profession_id'=>$professionId,
        ]);

        // Se crea un usuario con valores aleatorios
        factory(User::class, 48)->create();

    }
}
