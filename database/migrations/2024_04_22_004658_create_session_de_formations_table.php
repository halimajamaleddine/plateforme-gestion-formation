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
        Schema::create('session_de_formations', function (Blueprint $table) {
            $table->increments('id_sessionformation');
            $table->date('datedebut');
            $table->date('datefin');
            $table->integer('salle');
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
        Schema::dropIfExists('session_de_formations');
    }
};