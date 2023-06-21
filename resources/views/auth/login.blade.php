<x-guest-layout>
    <!-- Session Status -->
    <x-auth_session_status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input_label for="email" :value="__('Email')" />
            <x-text_input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input_error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input_label for="password" :value="__('Password')" />

            <x-text_input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input_error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
            @endif

            <x-primary_button class="ml-3">
                {{ __('Log in') }}
            </x-primary_button>
        </div>
    </form>
</x-guest-layout>
