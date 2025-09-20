<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['id', 'type', 'libelle', 'date', 'coefficient', 'classe_id', 'matiere_id', 'professeur_id'];

    public $incrementing = false;

    protected $casts = [
        'date' => 'datetime',
        'coefficient' => 'float'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
