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

<<<<<<< HEAD:database/migrations/2024_04_22_013340_remove_foreign_keys_from_dependent_tables.php
        // Supprimer la table si elle existe
       // Schema::dropIfExists('enseignant_chercheurs');

        // Réactiver la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
=======
            // Supprimer la table si elle existe
            // Schema::dropIfExists('enseignant_chercheurs');
    
            // Réactiver la vérification des clés étrangères
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            });
    
      
>>>>>>> c9ebe0355eb81d322e7137d401b2ef9526f7b648:database/migrations/2024_04_22_093417_remove_foreign_keys_from_dependent_tables.php
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
