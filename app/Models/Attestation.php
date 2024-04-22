<?php

namespace App\Models;

use App\Models\Enseignant_chercheur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;
    protected $table = 'attestations';

    protected $primaryKey = 'id_attestation';

    protected $fillable = ['id_enseignant', 'contenu', 'date'];

    protected $dates = ['date'];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant_chercheur::class, 'id_enseignant');
    }
}

