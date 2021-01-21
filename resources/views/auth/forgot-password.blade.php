<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Vous avez oublié votre mot de passe? Aucun souci. Indiquez votre adresse mail et nous vous enverrons un lien de réinitialisation pour vous permettre de choisir un nouveau mot de passe.') }}
        </div>
        <button class="sr-only">
            {{ __('Vous avez oublié votre mot de passe? Aucun souci. Indiquez votre adresse mail et nous vous enverrons un lien de réinitialisation pour vous permettre de choisir un nouveau mot de passe.') }}
        </button>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button>
                    {{ __('Recevoir le lien') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
