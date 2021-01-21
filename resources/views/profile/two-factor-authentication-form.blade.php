<x-jet-action-section>
    <x-slot name="title">
        {{ __('Authentification à deux facteurs') }}
        <button class="sr-only">
            Authentification à deux facteurs
        </button>
    </x-slot>

    <x-slot name="description">
        {{ __('Améliorez la sécurité de votre compte en utilisant l\'authentification à deux facteurs.') }}
        <button class="sr-only">
            Améliorez la sécurité de votre compte en utilisant l\'authentification à deux facteurs
        </button>
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                {{ __('Vous avez activé l\'authentification à deux facteurs.') }}
                <button class="sr-only">
                    {{ __('Vous avez activé l\'authentification à deux facteurs.') }}
                </button>
            @else
                {{ __('Vous n\'avez pas activé l\'authentification à deux facteurs.') }}
                <button class="sr-only">
                    {{ __('Vous n\'avez pas activé l\'authentification à deux facteurs.') }}
                </button>
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Quand l\'authentification à deux facteurs est activée, un code aléatoire vous est fourni. Vous pourrez retrouver ce code sur votre application mobile Google Authenticator') }}
            </p>
            <button class="sr-only">
                {{ __('Quand l\'authentification à deux facteurs est activée, un code aléatoire vous est fourni. Vous pourrez retrouver ce code sur votre application mobile Google Authenticator') }}
            </button>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('L\'authentification à deux facteurs est maintenant activée. Scannez le QR code grâce à votre application Google Authenticator.') }}
                    </p>
                    <button class="sr-only">
                        {{ __('L\'authentification à deux facteurs est maintenant activée. Scannez le QR code grâce à votre application Google Authenticator.') }}
                    </button>
                </div>

                <div class="mt-4 dark:p-4 dark:w-56 dark:bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Conservez ces codes de récupération dans un gestionnaire de mots de passe sécurisé. Ils pourront être utilisés pour récupérer votre compte si vous perdez votre mobile.') }}
                    </p>
                    <button class="sr-only">
                        {{ __('Conservez ces codes de récupération dans un gestionnaire de mots de passe sécurisé. Ils pourront être utilisés pour récupérer votre compte si vous perdez votre mobile.') }}
                    </button>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Activer') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Générer les codes de récupération') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Voir les codes de récupération') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('Désactiver') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
