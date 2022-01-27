<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'f_name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
