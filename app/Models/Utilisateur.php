<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'login',
        'password',
        'nom',
        'prenom',
        'email',
        'telephone',
        'sexe',
        'date_naissance',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'date_naissance' => 'date',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Relations
    public function eleve()
    {
        return $this->hasOne(Eleve::class, 'id', 'id');
    }

    public function professeur()
    {
        return $this->hasOne(Professeur::class, 'id', 'id');
    }

    public function administrateur()
    {
        return $this->hasOne(Administrateur::class, 'id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function isAdmin()
    {
        return $this->type === 'administrateur';
    }

    public function isProfesseur()
    {
        return $this->type === 'professeur';
    }

    public function isEleve()
    {
        return $this->type === 'eleve';
    }
}
