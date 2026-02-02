<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@kasbn.com',
            'password' => Hash::make('Admin@123'),
        ]);
    }
}
