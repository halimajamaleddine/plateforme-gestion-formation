<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id_reservation');
            $table->unsignedInteger('id_sessionformation'); // Ajout de la colonne 'id_sessionformation'
            $table->foreign('id_sessionformation')->references('id_sessionformation')->on('session_de_formations');
            
            $table->unsignedInteger('id_ressource'); // Ajout de la colonne 'id_ressource'
            $table->foreign('id_ressource')->references('id_ressource')->on('ressources');
            
            $table->unsignedInteger('id_enseignant'); // Ajout de la colonne 'id_enseignant'
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
