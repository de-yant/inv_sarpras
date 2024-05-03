<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => 'ADM001',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'foto_profile' => 'default.png',
            'password' => bcrypt('password'),
        ]);
    }
}
