<?php

namespace App\Models;
use App\Models\Enseignant_chercheur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

        protected $primaryKey = 'id_notification';

        protected $fillable = ['id_enseignant', 'contenu', 'date'];

        protected $dates = ['date'];


        public function enseignantChercheur()
        {
            return $this->belongsTo(Enseignant_chercheur::class, 'id_enseignant');
        }
}
