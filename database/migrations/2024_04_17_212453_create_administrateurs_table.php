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
    Schema::create('administrateurs', function (Blueprint $table) {
        $table->id('id_administrateur');
        $table->unsignedBigInteger('id_user'); // Ajout de la colonne 'id_user'
        $table->foreign('id_user')->references('id_user')->on('users'); // Déclaration de la contrainte de clé étrangère
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrateurs');
    }
};
