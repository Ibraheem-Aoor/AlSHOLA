<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ali Jassem',
            'email' => 'admin@admin',
            'status'=> 'active',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'type' => 'admin',
        ]);
    }
}
