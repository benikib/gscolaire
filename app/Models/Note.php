<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['id', 'valeur', 'eleve_id', 'evaluation_id'];

    public $incrementing = false;

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
