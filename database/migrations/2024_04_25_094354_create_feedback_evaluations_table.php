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
        Schema::create('feedback_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained();
            $table->string('formateur');
            $table->string('objectif', 100);
            $table->string ('observation_objectif', 50);
            $table->integer ('possibilite');
            $table->string('observation_possibilite', 50);
            $table->integer('construction');
            $table->string('observation_construction', 50);
            $table->integer('animation');
            $table->string('observation_animation', 50);
            $table->integer('organisation');
            $table->string('observation_organisation', 50);
            $table->integer('echange');
            $table->string('observation_echange', 50);
            $table->integer('satisfation');
            $table->string('observation_satisfation', 50);
            $table->integer('rythme');
            $table->string('observation_rythme', 50);
            $table->string('points_forts', 50);
            $table->string('points_faibles', 50);
            $table->string('propositions', 50);
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_evaluations');
    }
};
