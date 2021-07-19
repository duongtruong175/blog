<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'projectt218@gmail.com',
            'password' => Hash::make('project@987')
        ]);
        \App\Models\Role::create([
            'name' => 'admin'
        ]);
    }
}
