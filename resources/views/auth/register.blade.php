<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <title>Couteau Suisse | S'inscrire</title>
            <img src="{{asset('images/artois.png')}}" alt="Logo de l'université d'artois" style="height: 10rem; margin-top: 10%">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Adresse email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmation de mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-jet-label value="{{ __('Avez-vous un handicap visuel ?') }}"></x-jet-label>
            </div>
            <div>
                <input type="radio" id="daltonien" name="handicap" value="daltonien"
                       autocomplete="daltonien" >
                <label for="daltonien">Daltonie</label>

                <input type="radio" id="dyslexie" name="handicap" value="dyslexie"
                       autocomplete="dyslexie" >
                <label for="dyslexie">Dyslexie</label>

                <input type="radio" id="malvoyant" name="handicap" value="malvoyant"
                       autocomplete="malvoyant" >
                <label for="malvoyant">Malvoyant</label>

                <input type="radio" id="non" name="handicap" value="non"
                       autocomplete="handicap"
                       checked

                       >
                <label for="non">Non</label>
            </div>
            <div class="mt-4">
                <x-jet-label value="{{ __('Personnel') }}"></x-jet-label>
            </div>
            <div>
                <input type="radio" id="ouiPersonnel" name="personnel" value="oui"
                       autocomplete="personnel" >
                <label for="ouiPersonnel">Oui</label>
                <input type="radio" id="nonPersonnel" name="personnel" value="non"
                       autocomplete="personnel"
                       checked

                >
                <label for="nonPersonnel">Non</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déja inscrit ? Connectez-vous') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('S\'inscrire') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
