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
        Schema::create('enseignant_chercheurs', function (Blueprint $table) {
            $table->increments('id_enseignant');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->string('etablissement')->nullable(false);
            $table->integer('anciennete')->nullable(false);
<<<<<<< HEAD
            $table->integer('grade')->nullable();
            $table->timestamps();-
=======
            $table->string('motivations');
            $table->string('grade')->nullable();
            $table->timestamps();
>>>>>>> c9ebe0355eb81d322e7137d401b2ef9526f7b648
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_chercheurs');
    }
};
