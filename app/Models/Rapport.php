<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rapport extends Model
{
    use HasFactory;

        protected $table = 'rapports';

        protected $fillable = ['id_formation', 'date', 'dure', 'contenu'];

        protected $dates = ['date'];


        public function formation()
        {
            return $this->belongsTo(Formation::class, 'id_formation');
        }

    }

