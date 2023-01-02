<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\policy::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'codelink',
        //     'email' => 'admin@gmail.com',
        //     'password'=> Hash::make('admin@123'),
        //     'gender'=> 'male',
        //     'role_as'=> 1,
        // ]);
    }
}
