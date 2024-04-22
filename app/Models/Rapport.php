<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapport extends Model
{
    use HasFactory;
    protected $table = 'rapports';

    protected $fillable = ['id_formation', 'date', 'dure', 'contenu'];

    protected $dates = ['date'];


    public function formation()
    {
        return $this->belongsTo(Formations::class, 'id_formation');
    }
}
