<x-app-layout>
    <x-slot name="header">
        <title>Couteau Suisse | Actualités</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualités') }}
        </h2>
    </x-slot>

    <!-- Affiche un message de status lors de la manipulation d'une news -->
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
        </div>
    @endif

<!-- Affiche le bouton de création d'actualités seulement pour les administrateurs -->
    <div class="float-right mt-2 mr-4">
        @if (Auth::user()->role ==='admin')
            <a href="{{url('news/create')}}"
               class="btn btn-primary mt-3 mr-2">
                Ajouter une nouvelle actualité
            </a>
        @endif
    </div>

    <!-- Affichage des éléments de l'actualité et d'une barre de recherche -->
    @livewire('filter')
    @include('footer')
</x-app-layout>
