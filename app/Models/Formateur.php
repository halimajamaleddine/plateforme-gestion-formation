<?php

namespace App\Models;


use App\Models\Formation;
use App\Models\Session_de_formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model

{
    use HasFactory;
    protected $table = 'formateurs';

    protected $primaryKey = 'id_formateur';

    protected $fillable = ['nom', 'prenom', 'statue'];


    public function sessionFormations()
    {
        return $this->hasMany(Session_de_formation::class, 'id_formateur');
    }
    public function formation()
    {
        return $this->hasMany(Formation::class, 'id_formation');
    }
}
