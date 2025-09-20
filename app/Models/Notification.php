<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id', 'date_envoi', 'contenu', 'statut_envoi', 'parent_id', 'service_notification_id'];

    public $incrementing = false;

    protected $casts = [
        'date_envoi' => 'datetime',
        'statut_envoi' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function service()
    {
        return $this->belongsTo(ServiceNotification::class);
    }
}
