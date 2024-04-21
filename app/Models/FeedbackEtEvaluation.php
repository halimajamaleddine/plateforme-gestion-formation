<?php

namespace App\Models;

use App\Models\EnseignantChercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedbackEtEvaluation extends Model
{
    use HasFactory;

        protected $table = 'feedback_et_avaluations';

        protected $primaryKey = 'idFeedbackEval';

        protected $fillable = ['id_Enseignat', 'contenu', 'date'];


        protected $dates = ['date'];


        public function enseignantChercheur()
        {
            return $this->belongsTo(EnseignantChercheur::class, 'id_Enseignat');
        }

    }

