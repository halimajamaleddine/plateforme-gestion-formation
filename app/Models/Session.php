<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected  $fillable = ['nom_ressource', 'type_ressource', 'disponibilite_ressource', 'datedebut', 'datefin', 'salle', 'formateur_id', 'formations_id'];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class,'formateur_id');
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class ,'formations_id');
    }
}
 