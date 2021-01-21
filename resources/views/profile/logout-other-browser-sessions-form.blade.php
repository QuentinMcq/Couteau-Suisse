<x-jet-action-section>
    <x-slot name="title">
        <button class="sr-only">
            Sessions de connexion
        </button>
        {{ __('Sessions de connexion') }}
    </x-slot>

    <x-slot name="description">
        <button class="sr-only">
            Gérer et se déconnecter des sessions de connexion
        </button>
        {{ __('Gérer et se déconnecter des sessions de connexion.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            <button class="sr-only">
                Si nécessaire, vous pouvez vous déconnecter de toutes les sessions de vos appareils. Certaines sessions récentes peuvent ne pas apparaître ci-dessous; cependant, cette liste n\'exhaustive. Si vous pensez que votre compte est compromis, vous devriez également changer votre mot de passe
            </button>
            {{ __('Si nécessaire, vous pouvez vous déconnecter de toutes les sessions de vos appareils. Certaines sessions récentes peuvent ne pas apparaître ci-dessous; cependant, cette liste n\'exhaustive. Si vous pensez que votre compte est compromis, vous devriez également changer votre mot de passe.') }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                </svg>
                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-sm text-gray-600">
                                <button class="sr-only">
                                    {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                                </button>
                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    <button class="sr-only">
                                        {{ $session->ip_address }}
                                    </button>
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">
                                            <button class="sr-only">
                                            Cet appareil
                                            </button>
                                            {{ __('Cet appareil') }}</span>
                                    @else
                                        <button class="sr-only">
                                            Dernière utilisation  {{ $session->last_active }}
                                        </button>
                                        {{ __('Dernière utilisation') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Se déconnecter de toutes les autres sessions') }}
            </x-jet-button>

            <x-jet-action-message class="ml-3" on="loggedOut">
                {{ __('Déconnexion réalisée.') }}
            </x-jet-action-message>
        </div>

        <!-- Logout Other Devices Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('Déconnecter les autres sessions') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Veuillez entrer votre mot de passe pour confirmer la déconnexion de l\'ensemble de vos sessions sur tous vos appareils.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Annuler') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    {{ __('Déconnecter toutes les autres sessions') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
