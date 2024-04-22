<?php

namespace App\Models;

use App\Models\Formateur;
use App\Models\Enseignant_chercheur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;
    protected $table = 'inscriptions';

    protected $primaryKey = 'id_inscription';

    protected $fillable = ['id_enseignant', 'id_formateur'];


    public function enseignantChercheur()
    {
        return $this->belongsTo(Enseignant_chercheur::class, 'id_enseignant');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'id_formateur');
    }

}
