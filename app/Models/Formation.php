<?php

namespace App\Models;

use et;
use App\Models\Rapport;
use App\Models\Formateur;
use App\Models\Session_de_formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $table = 'formations';

    protected $primaryKey = 'id_formation';

    protected $fillable = ['titre', 'objectif', 'contenu', 'date', 'id_formateur', 'ressource'];

    protected $dates = ['date'];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'id_formateur');
    }

    public function sessionFormations()
    {
        return $this->hasMany(Session_de_formation::class, 'id_formation');

    }
    public function feedback_et_evaluation()
    {        return $this->hasMany(Feedback_et_evaluation:: class,'id_FeedbackEval');
    }

    public function rapport()
    {
        return $this->hasMany(Rapport::class, 'id_rapport');
    }
}
