<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'formateur_id'];

    // Relations
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function formation()
    {
        return $this->hasOne(Formation::class);
    }

    public function formateur()
    {
        return $this->hasOne(Formateur::class);
    }
}
