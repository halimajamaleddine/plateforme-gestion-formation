<?php

namespace App\Models;

use App\Models\Formateur;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionDeFormation extends Model
{
    use HasFactory;

        protected $table = 'session_de_formation';

        protected $primaryKey = 'id_sessionformation';

        protected $fillable = ['datedebut', 'datefin', 'salle', 'id_formateur'];

        protected $dates = ['datedebut', 'datefin'];


        public function formateur()
        {
            return $this->belongsTo(Formateur::class, 'id_formateur');
        }


        public function reservations()
        {
            return $this->hasMany(Reservation::class, 'id_sessionformation');
        }

    }


