<?php

namespace App\Models;

use App\Models\formation;
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
        return $this->hasMany(session_de_formation::class, 'id_formateur');
    }
}
