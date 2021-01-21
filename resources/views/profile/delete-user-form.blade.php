<x-jet-action-section>
    <x-slot name="title">
        <button class="sr-only">
            {{ __('Supprimer mon compte') }}
        </button>
        {{ __('Supprimer mon compte') }}
    </x-slot>

    <x-slot name="description">
        <button class="sr-only">
            Supprimer définitivement mon compte
        </button>
        {{ __('Supprimer définitivement mon compte.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            <button class="sr-only">
                Une fois que votre compte à été définitement supprimé, toutes ses ressources et ses données le seront également. avant de supprimer votre compte, pensez à télécharger toute donnée ou information que vous souhaitez conserver
            </button>
            {{ __('Une fois que votre compte à été définitement supprimé, toutes ses ressources et ses données le seront également. avant de supprimer votre compte, pensez à télécharger toute donnée ou information que vous souhaitez conserver.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Supprimer mon compte') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Supprimer mon compte') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Etes-vous sûr de vouloir supprimer définitivement votre compte? Une fois que votre compte à été définitement supprimé, toutes ses ressources et ses données le seront également. Merci d\'entrer votre mot de passe pour confirmer la suppression définitive de votre compte.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Annuler') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Supprimer mon compte') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
