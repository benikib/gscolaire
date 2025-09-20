<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des bulletins') }}
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

            <!-- Filtres -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.bulletins.filtrer') }}"
                        class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                            <select name="statut" id="statut"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Tous les statuts</option>
                                @foreach($statuts as $statut)
                                    <option value="{{ $statut->id }}" {{ request('statut') == $statut->id ? 'selected' : '' }}>
                                        {{ $statut->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="periode" class="block text-sm font-medium text-gray-700">Période</label>
                            <select name="periode" id="periode"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Toutes les périodes</option>
                                <option value="1" {{ request('periode') == '1' ? 'selected' : '' }}>1er Trimestre</option>
                                <option value="2" {{ request('periode') == '2' ? 'selected' : '' }}>2ème Trimestre
                                </option>
                                <option value="3" {{ request('periode') == '3' ? 'selected' : '' }}>3ème Trimestre
                                </option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Filtrer
                            </button>
                        </div>

                        <div class="flex items-end">
                            <a href="{{ route('admin.bulletins.statistiques') }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Statistiques
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Liste des bulletins -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Élève
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Période
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date génération
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($bulletins as $bulletin)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $bulletin->eleve->utilisateur->prenom }}
                                                {{ $bulletin->eleve->utilisateur->nom }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $bulletin->eleve->classe->nom ?? 'Classe non définie' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $bulletin->periode }}{{ $bulletin->periode == 1 ? 'er' : 'ème' }} Trimestre
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    @if($bulletin->statut_publication_id == 'brouillon') bg-gray-100 text-gray-800
                                                    @elseif($bulletin->statut_publication_id == 'valide') bg-yellow-100 text-yellow-800
                                                    @elseif($bulletin->statut_publication_id == 'publie') bg-green-100 text-green-800
                                                    @endif">
                                                {{ $bulletin->statutPublication->nom ?? $bulletin->statut_publication_id }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $bulletin->date_generation ? $bulletin->date_generation->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.bulletins.show', $bulletin) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    Voir
                                                </a>

                                                @if($bulletin->statut_publication_id == 'brouillon')
                                                    <form method="POST"
                                                        action="{{ route('admin.bulletins.valider', $bulletin) }}"
                                                        class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                                            Valider
                                                        </button>
                                                    </form>
                                                @endif

                                                @if($bulletin->statut_publication_id == 'valide')
                                                    <form method="POST"
                                                        action="{{ route('admin.bulletins.publier', $bulletin) }}"
                                                        class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-green-600 hover:text-green-900 bg-green-100 hover:bg-green-200 px-2 py-1 rounded">
                                                            Publier
                                                        </button>
                                                    </form>
                                                @endif

                                                @if($bulletin->statut_publication_id == 'publie')
                                                    <form method="POST"
                                                        action="{{ route('admin.bulletins.retirer', $bulletin) }}"
                                                        class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-2 py-1 rounded">
                                                            Retirer
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Aucun bulletin trouvé
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $bulletins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation pour la publication -->
    <script>
        function confirmerPublication(form) {
            if (confirm('Êtes-vous sûr de vouloir publier ce bulletin ?')) {
                form.submit();
            }
        }

        // Ajouter la confirmation à tous les boutons de publication
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form[action*="publier"]');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    confirmerPublication(this);
                });
            });
        });
    </script>
</x-app-layout>

