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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id_notification');
            $table->unsignedInteger('id_enseignant'); // Ajout de la colonne 'id_enseignant'
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            $table->string('contenu', 100);
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
