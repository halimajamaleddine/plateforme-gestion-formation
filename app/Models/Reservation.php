<?php

namespace App\Models;

use session;
use App\Models\Enseignant_chercheur;
use App\Models\Ressource;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';

    protected $primaryKey = 'id_reservation';

    protected $fillable = ['id_sessionformation', 'id_ressource', 'id_enseignant'];


    public function sessionFormation()
    {
        return $this->belongsTo(Session_de_formation::class, 'id_sessionformation');
    }


    public function ressource()
    {
        return $this->belongsTo(Ressource::class, 'id_ressource');
    }


    public function enseignantChercheur()
    {
        return $this->belongsTo(Enseignant_chercheur::class, 'id_enseignant');
    }
}
