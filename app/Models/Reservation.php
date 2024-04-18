<?php

namespace App\Models;

use App\Models\Ressource;
use App\Models\SessionDeFormation;
use App\Models\EnseignantChercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    public function sessionFormation()
    {
        return $this->belongsTo(SessionDeFormation::class, 'id_sessionformation');
    }

    public function ressource()
    {
        return $this->belongsTo(Ressource::class, 'id_ressource');
    }

    public function enseignant()
    {
        return $this->belongsTo(EnseignantChercheur::class, 'id_enseignant');
    }
}


