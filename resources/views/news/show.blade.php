<x-app-layout>
    <x-slot name="header">
        <title>Couteau Suisse | Détail</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualités') }}
        </h2>
    </x-slot>

    <br>
    <br>

    <!-- Afficher le bouton de création de news seulement pour les administrateurs -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-right row pb-1">
                    @if (Auth::user()->role ==='admin')
                        <a href="{{url('new/edit/' . $new->id)}}"
                           class="btn btn-primary">
                            <button class="sr-only">Modifier une actualité</button>

                            Modifier une actualité
                        </a>

                        <a href="{{url('new/destroy/' . $new->id)}}"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')" class="btn btn-danger">
                            <button class="sr-only">Supprimer l'actualité</button>
                            Supprimer l'actualité
                        </a>
                    @endif
                </div>
                <h3 class="card-title row">
                    <button class="sr-only">{{ $new->title }}</button>
                    {{ $new->title }}
                </h3>
            </div>
            <div class="card-body">
                <button class="sr-only">{{ $new->username }}</button>
                <p class="card-text">{{ $new->username }}</p>

                <button class="sr-only">{{ $new->department }}</button>
                <p class="text-muted font-bold">Département {{ $new->department }} </p>

                <button class="sr-only">{{ $new->informations }}</button>
                <p class="p-3" style="border-width: thin; border-radius: 1rem">{{ $new->informations }}</p>
                @if($new->url != null)
                    <iframe class="col-8"
                            src="https://www.youtube.com/watch?v=XRDhcjAK4lw&t=7s">
                    </iframe>
                @endif
                @if ($new->img !== null)
                    <img class="col-8 mt-3" src="{{asset('storage/images/' . $new->img)}}"/>
                @endif
            </div>

            <div class="card-footer">
                <a href="{{url('/news')}}" class="btn btn-success ml-3">Retour</a>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    a:link {
        text-decoration: none;
        color: black;
    }
</style>
