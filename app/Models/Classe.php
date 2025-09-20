<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['id', 'nom'];

    public $incrementing = false;

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
