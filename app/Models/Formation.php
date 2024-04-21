<?php

namespace App\Models;

use App\Models\Formateur;
use App\Models\SessionDeFormation;
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
            return $this->hasMany(SessionDeFormation::class, 'id_formation');
        }

    }

