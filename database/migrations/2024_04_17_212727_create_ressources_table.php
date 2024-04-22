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
            
            // Colonnes de référence avec des types de données compatibles
            $table->unsignedInteger('id_sessionformation');
            $table->unsignedInteger('id_ressource');
            $table->unsignedInteger('id_enseignant');
            
            // Contraintes de clé étrangère correctement formées
            $table->foreign('id_sessionformation')->references('id_sessionformation')->on('session_de_formations');
            $table->foreign('id_ressource')->references('id_ressource')->on('ressources');
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            
            $table->timestamps();
        });
    }
            

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
