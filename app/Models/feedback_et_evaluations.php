<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback_et_evaluations extends Model
{
    use HasFactory;
    protected $table = 'feedback_et_evaluations';

    protected $primaryKey = 'idFeedbackEval';

    protected $fillable = ['id_Enseignat', 'contenu', 'date'];


    protected $dates = ['date'];


    public function enseignantChercheur()
    {
        return $this->belongsTo(Enseignant_Chercheurs::class, 'id_Enseignat');
    }
}
