<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Administrateur;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Enseignant_chercheur;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    use Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'role',
        'etablissement',
        'anciennete',
        'grade',
        'in_formation'
    ];

    // Relation avec notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Relation avec inscriptions
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }



    protected $dates = ['email_verified_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
