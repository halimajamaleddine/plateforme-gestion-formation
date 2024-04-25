<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'formation_id', 'formateur', 'objectif', 'observation_objectif', 'possibilite', 'observation_possibilite',
        'construction', 'observation_construction', 'animation', 'observation_animation',
        'organisation', 'observation_organisation', 'echange', 'observation_echange',
        'satisfation', 'observation_satisfation', 'rythme', 'observation_rythme',
        'points_forts', 'points_faibles', 'propositions', 'date'
    ];

    // Relation avec formation
    public function formation()
    {
        return $this->Hasma(Formation::class);
    }
}
