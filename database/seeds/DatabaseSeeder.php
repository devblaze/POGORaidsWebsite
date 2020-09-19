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
        DB::table('access_levels')->insert([
            'name' => 'User',
            'label' => 'user'
        ]);
        DB::table('access_levels')->insert([
            'name' => 'Administrator',
            'label' => 'admin',
            'can_modify_users' => 1,
            'can_modify_users_access' => 1,
            'can_modify_trainers' => 1,
            'can_modify_raids' => 1,
            'can_modify_pokemons' => 1
        ]);
    }
}
