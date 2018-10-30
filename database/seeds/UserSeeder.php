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

        User::create([
            'name' => 'Another User',
            'email' => 'another@gmail.com',
            'password'=> bcrypt('laravel'),
            'profession_id'=> $professionId
        ]);

        User::create([
            'name' => 'Another User',
            'email' => 'another2@gmail.com',
            'password'=> bcrypt('laravel'),
            'profession_id'=> null
        ]);

    }
}
