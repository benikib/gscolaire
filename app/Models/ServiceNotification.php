<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceNotification extends Model
{
    public function abonner(Parent $parent, Eleve $eleve)
    {
        // Logique d'abonnement
        return true;
    }

    public function desabonner(Parent $parent, Eleve $eleve)
    {
        // Logique de désabonnement
        return true;
    }

    public function notifier(Publication $publication)
    {
        // Logique de notification pour une publication
        return true;
    }

    public function envoyerEmail(Parent $parent, string $message)
    {
        // Logique d'envoi d'email
        return true;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
