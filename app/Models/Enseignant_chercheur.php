<?php

namespace App\Models;


use App\Models\reservation;
use App\Models\attestation;
use App\Models\feedback_et_evaluation;
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
        return $this->hasMany(feedback_et_evaluation::class, 'id_enseignat');
    }

    public function attestations()
    {
        return $this->hasMany(attestation::class, 'id_enseignant');
    }

    public function reservations()
    {
        return $this->hasMany(reservation::class, 'id_enseignant');
    }
}
