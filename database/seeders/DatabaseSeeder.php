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
            'nom' => 'ELMENZHI',
            'prenom' => 'kaoutar',
            'email' => 'ELMENZHIkaoutar.admin@gmail.com',
            'role' => 'admin',
            'etablissement'=>  'FSJES',
            'password' => Hash::make('admin123'),
        ]);
    }
}
