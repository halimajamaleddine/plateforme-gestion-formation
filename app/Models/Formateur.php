<?php

namespace App\Models;

use App\Models\Session;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'statue'];


    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }


}
