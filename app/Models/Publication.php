<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = ['id', 'date_publication', 'statut', 'administrateur_id'];

    public $incrementing = false;

    protected $casts = [
        'date_publication' => 'datetime',
        'statut' => StatutPublication::class
    ];

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class);
    }
}
