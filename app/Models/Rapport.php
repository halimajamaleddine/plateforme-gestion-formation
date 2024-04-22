<?php

namespace App\Models;

use App\Models\formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rapport extends Model
{
    use HasFactory;
    protected $table = 'rapports';

    protected $fillable = ['id_formation', 'date', 'dure', 'contenu'];

    protected $dates = ['date'];


    public function formation()
    {
        return $this->belongsTo(formation::class, 'id_formation');
    }
}
