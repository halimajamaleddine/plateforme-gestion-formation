<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attestation extends Model
{
    use HasFactory;
    protected $table = 'attestations';

    protected $primaryKey = 'id_attestation';

    protected $fillable = ['id_enseignant', 'contenu', 'date'];

            protected $dates = ['date'];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant_Chercheus::class, 'id_enseignant');
    }
}
