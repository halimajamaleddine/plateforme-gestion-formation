<?php

namespace App\Models;

use session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservations extends Model
{
    use HasFactory;
    protected $table = 'reservations';

    protected $primaryKey = 'id_reservation';

    protected $fillable = ['id_sessionformation', 'id_ressource', 'id_enseignant'];


    public function sessionFormation()
    {
        return $this->belongsTo(session_de_formation::class, 'id_sessionformation');
    }


    public function ressource()
    {
        return $this->belongsTo(Ressources::class, 'id_ressource');
    }


    public function enseignantChercheur()
    {
        return $this->belongsTo(Enseignant_chercheurs::class, 'id_enseignant');
    }
}
