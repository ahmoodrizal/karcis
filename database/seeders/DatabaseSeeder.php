<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kim Minju',
            'password' => 'password',
            'email' => 'minguri@izone.co.kr',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Hanni Pham',
            'password' => 'password',
            'email' => 'hanni@nj.co.kr',
        ]);
    }
}
