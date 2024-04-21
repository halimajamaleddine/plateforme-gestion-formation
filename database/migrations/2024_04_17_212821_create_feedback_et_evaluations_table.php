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
            $table->foreign('id_Enseignat')->constained('enseignant_chercheurs');
            $table->foreign('id_formation')->constained('formations');
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
