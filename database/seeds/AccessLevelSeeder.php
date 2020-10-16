<?php

namespace Database\Seeders;

use App\AccessLevel;
use Illuminate\Database\Seeder;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessLevel::create([
            'name' => 'User',
            'label' => 'user'
        ]);
        AccessLevel::create([
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
