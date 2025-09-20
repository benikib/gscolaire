<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['id', 'nom'];

    public $incrementing = false;

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function resultatsMatiere()
    {
        return $this->hasMany(ResultatMatiere::class);
    }
}
