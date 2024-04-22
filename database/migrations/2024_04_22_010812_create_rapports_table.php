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
        Schema::create('rapports', function (Blueprint $table) {
            $table->increments('id_rapport');
            $table->integer('id_formation')->unsigned();
            $table->foreign('id_formation')->references('id_formation')->on('formations');
            $table->dateTime('date')->useCurrent();
            $table->integer('dure')->comment('Durée en jours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
