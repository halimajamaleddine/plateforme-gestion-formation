<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

        protected $primaryKey = 'id_notification';

        protected $fillable = ['id_enseignant', 'contenu', 'date'];

        protected $dates = ['date'];


        public function enseignantChercheur()
        {
            return $this->belongsTo(Enseignant_Chercheurs::class, 'id_enseignant');
        }
}
