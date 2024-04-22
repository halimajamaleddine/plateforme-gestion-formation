<?php

namespace App\Models;

use App\Models\Enseignant_chercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback_et_evaluation extends Model
{
    use HasFactory;
    protected $table = 'feedback_et_evaluations';

    protected $primaryKey = 'idFeedbackEval';

    protected $fillable = ['id_Enseignat', 'contenu', 'date'];


    protected $dates = ['date'];


    public function enseignantChercheur()
    {
        return $this->belongsTo(Enseignant_chercheur::class, 'id_enseignant');
    }
}
