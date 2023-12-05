<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'zz@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Replace 'your_password' with the desired password
            'admin' => 1, // You can adjust the admin status as needed
            'remember_token' => "retrsda",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
