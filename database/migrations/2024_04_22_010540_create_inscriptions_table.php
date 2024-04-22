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
            $table->integer('id_enseignant')->unsigned();
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant_chercheurs');
            
            $table->integer('id_formateur')->unsigned();
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
