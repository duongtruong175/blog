<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // \App\Models\User::create([
        //     'name' => 'Admin',
        //     'email' => 'projectt218@gmail.com',
        //     'password' => Hash::make('project@987')
        // ]);
        // \App\Models\Role::create([
        //     'name' => 'admin'
        // ]);

        // $categories = ['News', 'Opinion', 'Tutorial', 'Review'];

        // foreach ($categories as $category)
        // {
        //     Category::create(['name' => $category]);
        // }
    }
}
