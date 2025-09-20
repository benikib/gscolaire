<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du bulletin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Messages de succès/erreur -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Informations générales du bulletin -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations de l'élève</h3>
                            <div class="space-y-2">
                                <p><span class="font-medium">Nom :</span> {{ $bulletin->eleve->utilisateur->nom }}</p>
                                <p><span class="font-medium">Prénom :</span> {{ $bulletin->eleve->utilisateur->prenom }}
                                </p>
                                <p><span class="font-medium">Classe :</span>
                                    {{ $bulletin->eleve->classe->nom ?? 'Non définie' }}</p>
                                <p><span class="font-medium">Email :</span> {{ $bulletin->eleve->utilisateur->email }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations du bulletin</h3>
                            <div class="space-y-2">
                                <p><span class="font-medium">Période :</span>
                                    {{ $bulletin->periode }}{{ $bulletin->periode == 1 ? 'er' : 'ème' }} Trimestre</p>
                                <p><span class="font-medium">Statut :</span>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($bulletin->statut_publication_id == 'brouillon') bg-gray-100 text-gray-800
                                        @elseif($bulletin->statut_publication_id == 'valide') bg-yellow-100 text-yellow-800
                                        @elseif($bulletin->statut_publication_id == 'publie') bg-green-100 text-green-800
                                        @endif">
                                        {{ $bulletin->statutPublication->nom ?? $bulletin->statut_publication_id }}
                                    </span>
                                </p>
                                <p><span class="font-medium">Date génération :</span>
                                    {{ $bulletin->date_generation ? $bulletin->date_generation->format('d/m/Y H:i') : '-' }}
                                </p>
                                @if($bulletin->date_publication)
                                    <p><span class="font-medium">Date publication :</span>
                                        {{ $bulletin->date_publication->format('d/m/Y H:i') }}</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Actions</h3>
                            <div class="space-y-2">
                                <a href="{{ route('admin.bulletins.index') }}"
                                    class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Retour à la liste
                                </a>

                                @if($bulletin->statut_publication_id == 'brouillon')
                                    <form method="POST" action="{{ route('admin.bulletins.valider', $bulletin) }}"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                            Valider le bulletin
                                        </button>
                                    </form>
                                @endif

                                @if($bulletin->statut_publication_id == 'valide')
                                    <form method="POST" action="{{ route('admin.bulletins.publier', $bulletin) }}"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Êtes-vous sûr de vouloir publier ce bulletin ?')"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Publier le bulletin
                                        </button>
                                    </form>
                                @endif

                                @if($bulletin->statut_publication_id == 'publie')
                                    <form method="POST" action="{{ route('admin.bulletins.retirer', $bulletin) }}"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Retirer de la publication
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Résultats par matière -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Résultats par matière</h3>

                    @if($bulletin->resultatMatieres->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Matière
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Moyenne
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Coefficient
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Appréciation
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($bulletin->resultatMatieres as $resultatMatiere)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $resultatMatiere->matiere->nom ?? 'Matière non définie' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span
                                                    class="font-semibold">{{ number_format($resultatMatiere->moyenne, 2) }}/20</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $resultatMatiere->coefficient ?? 1 }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $resultatMatiere->appreciation ?? 'Aucune appréciation' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Moyenne générale -->
                        @php
                            $moyenneGenerale = $bulletin->resultatMatieres->where('moyenne', '>', 0)->avg('moyenne');
                            $totalCoefficients = $bulletin->resultatMatieres->sum('coefficient');
                        @endphp

                        @if($moyenneGenerale)
                            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-medium text-gray-900">Moyenne générale :</span>
                                    <span
                                        class="text-2xl font-bold text-blue-600">{{ number_format($moyenneGenerale, 2) }}/20</span>
                                </div>
                                <div class="mt-2 text-sm text-gray-600">
                                    Total des coefficients : {{ $totalCoefficients }}
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <p>Aucun résultat de matière trouvé pour ce bulletin.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

