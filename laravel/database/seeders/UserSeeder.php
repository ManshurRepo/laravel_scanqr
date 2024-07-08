<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin Yopi',
            'email' => 'yopi@gmail.com',
            'password' => Hash::make('12345678'),
            'roles' => 'ADMIN'
        ]);



    }
}
