<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatMatiere extends Model
{
    protected $fillable = ['moyenne', 'appreciation', 'bulletin_id', 'matiere_id'];

    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
