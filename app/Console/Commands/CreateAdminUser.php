<?php

namespace App\Console\Commands;

use App\Models\Administrateur;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public function handle()
    {
        $name = $this->ask('Enter admin name');
        $prenom = $this->ask('Enter admin prenom');
        $email = $this->ask('Enter admin email');
        $password = $this->secret('Enter admin password');
    
        // Créer l'administrateur en utilisant la relation
        $administrateur = Administrateur::create();
    
        // Créer l'utilisateur avec l'administrateur associé
        $user = $administrateur->user()->create([
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'admin',
        ]);
    
        $this->info('Admin user created successfully.');
    }
    
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
}
