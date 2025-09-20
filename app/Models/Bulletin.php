<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'id',
        'periode',
        'date_generation',
        'eleve_id',
        'statut_publication_id',
        'date_validation',
        'date_publication',
        'date_retrait'
    ];

    public $incrementing = false;

    protected $casts = [
        'date_generation' => 'datetime',
        'date_validation' => 'datetime',
        'date_publication' => 'datetime',
        'date_retrait' => 'datetime'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function resultatMatieres()
    {
        return $this->hasMany(ResultatMatiere::class);
    }

    public function statutPublication()
    {
        return $this->belongsTo(StatutPublication::class, 'statut_publication_id', 'id');
    }

    public function calculeMoyenneGenerale()
    {
        return $this->resultatMatieres()->avg('moyenne') ?? 0;
    }

    public function getStatutAttribute()
    {
        return $this->statutPublication->nom ?? $this->statut_publication_id;
    }
}
