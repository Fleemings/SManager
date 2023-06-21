<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('When your account is deleted, all your resources and data will be permanently deleted.') }}
        </h2>
    </header>

    <x-danger_button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Deletar Conta') }}</x-danger_button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('When your account is deleted, all your resources and data will be permanently deleted. Please enter your password to confirm that you want to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input_label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text_input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('Palavra-Passe') }}" />

                <x-input_error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary_button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary_button>

                <x-danger_button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger_button>
            </div>
        </form>
    </x-modal>
</section>
