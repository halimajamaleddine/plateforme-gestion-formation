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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id_inscription');
            $table->unsignedInteger('id_enseignant');
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            $table->unsignedBigInteger('id_formateur');
            $table->foreign('id_formateur')->references('id_formateur')->on('formateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
