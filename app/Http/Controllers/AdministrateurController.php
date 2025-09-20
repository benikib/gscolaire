<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\StatutPublication;
use App\Models\Notification;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministrateurController extends Controller
{
    /**
     * Afficher la liste des bulletins par classe et période
     */
    public function index()
    {
        $bulletins = Bulletin::with(['eleve.utilisateur', 'resultatMatieres'])
            ->orderBy('periode', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $statuts = StatutPublication::all();

        return view('admin.bulletins.index', compact('bulletins', 'statuts'));
    }

    /**
     * Afficher les détails d'un bulletin
     */
    public function show(Bulletin $bulletin)
    {
        $bulletin->load([
            'eleve.utilisateur',
            'resultatMatieres.matiere',
            'resultatMatieres.evaluation.note'
        ]);

        return view('admin.bulletins.show', compact('bulletin'));
    }

    /**
     * Publier un bulletin (changer le statut à "Publié")
     */
    public function publier(Request $request, Bulletin $bulletin)
    {
        // Vérifier que le bulletin est validé
        if ($bulletin->statut_publication_id !== 'valide') {
            return back()->withErrors([
                'message' => 'Action impossible. Le bulletin doit d\'abord être validé.'
            ]);
        }

        try {
            DB::beginTransaction();

            // Changer le statut du bulletin à "Publié"
            $bulletin->update([
                'statut_publication_id' => 'publie',
                'date_publication' => now()
            ]);

            // Envoyer des notifications aux parents
            $this->envoyerNotifications($bulletin);

            DB::commit();

            return back()->with('success', 'Bulletin publié avec succès. Les notifications ont été envoyées.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors([
                'message' => 'Une erreur est survenue lors de la publication du bulletin.'
            ]);
        }
    }

    /**
     * Valider un bulletin (changer le statut à "Validé")
     */
    public function valider(Request $request, Bulletin $bulletin)
    {
        if ($bulletin->statut_publication_id !== 'brouillon') {
            return back()->withErrors([
                'message' => 'Seuls les bulletins en brouillon peuvent être validés.'
            ]);
        }

        $bulletin->update([
            'statut_publication_id' => 'valide',
            'date_validation' => now()
        ]);

        return back()->with('success', 'Bulletin validé avec succès.');
    }

    /**
     * Retirer un bulletin de la publication (revenir à "Validé")
     */
    public function retirer(Request $request, Bulletin $bulletin)
    {
        if ($bulletin->statut_publication_id !== 'publie') {
            return back()->withErrors([
                'message' => 'Seuls les bulletins publiés peuvent être retirés.'
            ]);
        }

        $bulletin->update([
            'statut_publication_id' => 'valide',
            'date_retrait' => now()
        ]);

        return back()->with('success', 'Bulletin retiré de la publication avec succès.');
    }

    /**
     * Filtrer les bulletins par statut, classe ou période
     */
    public function filtrer(Request $request)
    {
        $query = Bulletin::with(['eleve.utilisateur', 'resultatMatieres']);

        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut_publication_id', $request->statut);
        }

        // Filtre par période
        if ($request->filled('periode')) {
            $query->where('periode', $request->periode);
        }

        // Filtre par classe
        if ($request->filled('classe')) {
            $query->whereHas('eleve', function ($q) use ($request) {
                $q->where('classe_id', $request->classe);
            });
        }

        $bulletins = $query->orderBy('periode', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $statuts = StatutPublication::all();

        return view('admin.bulletins.index', compact('bulletins', 'statuts'));
    }

    /**
     * Envoyer des notifications aux parents lors de la publication
     */
    private function envoyerNotifications(Bulletin $bulletin)
    {
        $eleve = $bulletin->eleve;

        if ($eleve && $eleve->parent_id) {
            $parent = Utilisateur::find($eleve->parent_id);

            if ($parent) {
                // Créer une notification pour le parent
                Notification::create([
                    'id' => 'NOTIF_' . uniqid(),
                    'utilisateur_id' => $parent->id,
                    'titre' => 'Nouveau bulletin disponible',
                    'message' => "Le bulletin de {$eleve->utilisateur->prenom} {$eleve->utilisateur->nom} pour la période {$bulletin->periode} est maintenant disponible.",
                    'type' => 'bulletin_publie',
                    'lue' => false,
                    'date_envoi' => now()
                ]);

                // TODO: Ici, vous pouvez ajouter l'envoi d'email ou SMS
                // $this->envoyerEmail($parent, $bulletin);
                // $this->envoyerSMS($parent, $bulletin);
            }
        }

        // Créer une notification pour l'élève
        if ($eleve) {
            Notification::create([
                'id' => 'NOTIF_' . uniqid(),
                'utilisateur_id' => $eleve->id,
                'titre' => 'Votre bulletin est disponible',
                'message' => "Votre bulletin pour la période {$bulletin->periode} est maintenant disponible.",
                'type' => 'bulletin_publie',
                'lue' => false,
                'date_envoi' => now()
            ]);
        }
    }

    /**
     * Statistiques des bulletins
     */
    public function statistiques()
    {
        $stats = [
            'total_bulletins' => Bulletin::count(),
            'bulletins_brouillon' => Bulletin::where('statut_publication_id', 'brouillon')->count(),
            'bulletins_valides' => Bulletin::where('statut_publication_id', 'valide')->count(),
            'bulletins_publies' => Bulletin::where('statut_publication_id', 'publie')->count(),
            'bulletins_par_periode' => Bulletin::selectRaw('periode, COUNT(*) as count')
                ->groupBy('periode')
                ->orderBy('periode')
                ->get()
        ];

        return view('admin.bulletins.statistiques', compact('stats'));
    }
}
