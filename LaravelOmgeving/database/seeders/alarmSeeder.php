<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class alarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        DB::table('users')->insert([
            'name' => ',melvin',
            'email' => 'melvin@melvin.melvin',
            'password' => Hash::make('melvin'),
        ]);
        DB::table('alarms')->insert([
            'alarm' => 1,
        ]);
    }
}
