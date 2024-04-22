<?php

namespace App\Models;
use App\Models\reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressources extends Model
{
    use HasFactory;

    protected $table = 'ressources';

    protected $primaryKey = 'id_ressource';

    protected $fillable = ['nom', 'type', 'disponibilite'];

    public function reservations()
    {
        return $this->hasMany(reservation::class, 'id_ressource');
    }
}