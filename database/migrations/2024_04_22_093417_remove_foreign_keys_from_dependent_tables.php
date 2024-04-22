<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dependent_tables', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Supprimer la table si elle existe
       // Schema::dropIfExists('enseignant_chercheurs');

        // Réactiver la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });

            // Supprimer la table si elle existe
            // Schema::dropIfExists('enseignant_chercheurs');

            // Réactiver la vérification des clés étrangères
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');


            }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dependent_tables', function (Blueprint $table) {
            //
        });
    }



};
