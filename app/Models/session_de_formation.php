<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session_de_formation extends Model
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
            return $this->hasMany(reservations::class, 'id_sessionformation');
        }
}
