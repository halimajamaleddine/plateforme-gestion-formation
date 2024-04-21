<?php

namespace App\Models;

use App\Models\EnseignantChercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attestation extends Model

{
    use HasFactory;
        protected $table = 'attestations';

        protected $primaryKey = 'id_attestation';

        protected $fillable = ['id_enseignant', 'contenu', 'date'];

                protected $dates = ['date'];

        public function enseignant()
        {
            return $this->belongsTo(EnseignantChercheur::class, 'id_enseignant');
        }
    }
