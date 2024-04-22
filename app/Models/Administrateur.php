<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrateur extends Model
{
    use HasFactory;
    protected $table = 'administrateurs';

    protected $primaryKey = 'id_administrateur';

    protected $fillable = ['id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
