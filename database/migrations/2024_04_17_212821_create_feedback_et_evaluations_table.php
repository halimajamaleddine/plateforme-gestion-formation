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
            $table->increments('id_FeedbackEval');
            $table->unsignedInteger('id_enseignant'); // Ajout de la colonne 'id_enseignant'
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            $table->unsignedBigInteger('id_formation');
            $table->foreign('id_formation')->references('id_formation')->on('formations');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamp('date')->useCurrent();
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
