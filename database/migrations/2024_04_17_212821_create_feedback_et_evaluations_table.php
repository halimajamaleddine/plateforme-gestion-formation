<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('feedback_et_avaluations', function (Blueprint $table) {
            $table->increments('idFeedbackEval');
            $table->foreign('id_Enseignat')->constained('enseignant_chercheurs');
            $table->foreign('id_formation')->constained('formations');
            $table->integer('rating'); // Colonne pour le score de l'évaluation (nombre d'étoiles)
            $table->text('comment')->nullable();
            $table->timestamp('date')->useCurrent();// Colonne pour le commentaire associé (optionnelle)
            $table->timestamps();
            
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_et_evaluations');
    }
};
