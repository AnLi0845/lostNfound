<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Login ID -->
        <div class="mt-4">
            <x-input-label for="login_id" :value="__('Login ID')" />
            <x-text-input id="login_id" class="block mt-1 w-full" type="text" name="login_id" :value="old('login_id')" required autofocus />
            <x-input-error :messages="$errors->get('login_id')" class="mt-2" />
        </div>

        <!-- Nick Name -->
        <div class="mt-4">
            <x-input-label for="nick_name" :value="__('Nick Name')" />
            <x-text-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required />
            <x-input-error :messages="$errors->get('nick_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
