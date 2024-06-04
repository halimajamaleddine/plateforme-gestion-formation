<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'objectif', 'contenu', 'date', 'formateur_id', 'ressource'];

    // Relation avec formateur
    public function formateur()
    {
        return $this->hasMany(Formateur::class);
    }
    public function sessions()
    {
        return $this->hasMany(Session::class, 'formations_id');
    }

    // Relation avec feedback_evaluations
    public function feedbackEvaluations()
    {
        return $this->hasMany(FeedbackEvaluation::class);
    }
}

