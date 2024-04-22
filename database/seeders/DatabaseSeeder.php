<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'jamal eddine',
            'prenom' => 'halima',
            'email' => 'halima.admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
