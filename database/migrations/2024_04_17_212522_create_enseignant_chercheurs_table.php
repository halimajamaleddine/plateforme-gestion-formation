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
            $table->timestamps();
            $table->foreign('id_user')->constrained('users');
            $table->string('etablissement')->nullable(false);
            $table->integer('anciennete')->nullable(false);
            $table->integer('grade')->nullable();

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
