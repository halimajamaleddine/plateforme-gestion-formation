<?php

namespace App\Models;

use App\Models\EnseignantChercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

        protected $table = 'notifications';

        protected $primaryKey = 'id_notification';

        protected $fillable = ['id_enseignant', 'contenu', 'date'];

        protected $dates = ['date'];


        public function enseignantChercheur()
        {
            return $this->belongsTo(EnseignantChercheur::class, 'id_enseignant');
        }

    }

