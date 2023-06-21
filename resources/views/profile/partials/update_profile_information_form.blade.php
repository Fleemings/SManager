<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Update your account's profile information and email address.") }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input_label for="first_name" :value="__('First name')" />
            <x-text_input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $worker->first_name)" required autofocus autocomplete="first_name" />
            <x-input_error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        <div>
            <x-input_label for="last_name" :value="__('Last name')" />
            <x-text_input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $worker->last_name)" required autofocus autocomplete="last_name" />
            <x-input_error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input_label for="email" :value="__('Email')" />
            <x-text_input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $worker->email)" required autocomplete="username" />
            <x-input_error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input_label for="job_title" :value="__('Position')" />
            <x-text_input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title', $worker->job_title)" required autofocus autocomplete="job_title" />
            <x-input_error class="mt-2" :messages="$errors->get('job_title')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary_button>{{ __('Save') }}</x-primary_button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
