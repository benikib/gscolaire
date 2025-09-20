<?php

namespace App\Models;

class Eleve extends Utilisateur
{
    public function parent()
    {
        return $this->belongsTo(Utilisateur::class, 'parent_id', 'id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id', 'id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
}
