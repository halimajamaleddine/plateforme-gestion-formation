<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ressource extends Model
{
    use HasFactory;

        protected $table = 'ressources';

        public function reservations()
        {
            return $this->hasMany(Reservation::class, 'id_ressource');     }
        }


