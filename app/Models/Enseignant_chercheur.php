<?php

namespace App\Models;


use App\Models\Reservation;
use App\Models\attestation;
use App\Models\feedback_et_evaluation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignant_chercheur extends Model
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
        return $this->hasMany(Feedback_et_evaluation::class, 'id_enseignat');
    }

    public function attestations()
    {
        return $this->hasMany(Attestation::class, 'id_enseignant');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_enseignant');
    }
}
