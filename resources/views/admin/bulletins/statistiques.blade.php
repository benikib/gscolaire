<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistiques des bulletins') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Retour à la liste -->
            <div class="mb-6">
                <a href="{{ route('admin.bulletins.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    ← Retour à la liste des bulletins
                </a>
            </div>

            <!-- Statistiques générales -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total des bulletins
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900">
                                        {{ $stats['total_bulletins'] }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 6a1 1 0 000 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        En brouillon
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900">
                                        {{ $stats['bulletins_brouillon'] }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Validés
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900">
                                        {{ $stats['bulletins_valides'] }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Publiés
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900">
                                        {{ $stats['bulletins_publies'] }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Répartition par période -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Répartition par période scolaire</h3>

                    @if($stats['bulletins_par_periode']->count() > 0)
                        <div class="space-y-4">
                            @foreach($stats['bulletins_par_periode'] as $periode)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-blue-500 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium text-gray-900">
                                            {{ $periode->periode }}{{ $periode->periode == 1 ? 'er' : 'ème' }} Trimestre
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-2">{{ $periode->count }} bulletins</span>
                                        <div class="w-32 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-500 h-2 rounded-full"
                                                style="width: {{ $stats['total_bulletins'] > 0 ? ($periode->count / $stats['total_bulletins']) * 100 : 0 }}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <p>Aucune donnée de période disponible.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Graphique des statuts -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Répartition par statut</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div
                                class="w-24 h-24 bg-gray-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span
                                    class="text-2xl font-bold text-gray-600">{{ $stats['bulletins_brouillon'] }}</span>
                            </div>
                            <h4 class="text-sm font-medium text-gray-900">En brouillon</h4>
                            <p class="text-xs text-gray-500">
                                {{ $stats['total_bulletins'] > 0 ? round(($stats['bulletins_brouillon'] / $stats['total_bulletins']) * 100, 1) : 0 }}%
                            </p>
                        </div>

                        <div class="text-center">
                            <div
                                class="w-24 h-24 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span
                                    class="text-2xl font-bold text-yellow-600">{{ $stats['bulletins_valides'] }}</span>
                            </div>
                            <h4 class="text-sm font-medium text-gray-900">Validés</h4>
                            <p class="text-xs text-gray-500">
                                {{ $stats['total_bulletins'] > 0 ? round(($stats['bulletins_valides'] / $stats['total_bulletins']) * 100, 1) : 0 }}%
                            </p>
                        </div>

                        <div class="text-center">
                            <div
                                class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span class="text-2xl font-bold text-green-600">{{ $stats['bulletins_publies'] }}</span>
                            </div>
                            <h4 class="text-sm font-medium text-gray-900">Publiés</h4>
                            <p class="text-xs text-gray-500">
                                {{ $stats['total_bulletins'] > 0 ? round(($stats['bulletins_publies'] / $stats['total_bulletins']) * 100, 1) : 0 }}%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

