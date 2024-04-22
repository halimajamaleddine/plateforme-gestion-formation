<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignant_chercheurs extends Model
{
    use HasFactory;
    protected $table = 'enseignant_chercheurs';

    protected $primaryKey = 'id_enseignant';

    protected $fillable = ['id_user', 'etablissement', 'anciennete', 'grade'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function feedbackEvaluations()
    {
        return $this->hasMany(feedback_et_evaluations::class, 'id_enseignat');
    }

    public function attestations()
    {
        return $this->hasMany(Attestation::class, 'id_enseignant');
    }

    public function reservations()
    {
        return $this->hasMany(reservations::class, 'id_enseignant');
    }
}
