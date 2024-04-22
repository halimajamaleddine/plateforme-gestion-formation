<?php

namespace App\Models;

use App\Models\reservation;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session_de_formation extends Model
{
    use HasFactory;
    protected $table = 'session_de_formation';

    protected $primaryKey = 'id_sessionformation';

    protected $fillable = ['datedebut', 'datefin', 'salle', 'id_formateur'];

    protected $dates = ['datedebut', 'datefin'];


    public function formateur()
    {
        return $this->belongsTo(formateur::class, 'id_formateur');
    }


    public function reservations()
    {
        return $this->hasMany(reservation::class, 'id_sessionformation');
    }
}
