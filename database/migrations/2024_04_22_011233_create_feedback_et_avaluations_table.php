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
        if (!Schema::hasTable('feedback_et_evaluations')) {
        Schema::create('feedback_et_evaluations', function (Blueprint $table) {
            $table->increments('id_FeedbackEval');
            $table->integer('id_enseignant')->unsigned();
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            $table->integer('id_formation')->unsigned();
            $table->foreign('id_formation')->references('id_formation')->on('formations')
            ->onDelete('cascade');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->timestamps();





        });

    }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_et_avaluations');
    }
};
