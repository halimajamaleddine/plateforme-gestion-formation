<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnseignantChercheur extends Model
{
    use HasFactory;

    protected $table = 'enseignant_chercheurs';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}


