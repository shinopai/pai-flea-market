<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="auth-form" novalidate>
        @csrf
        <h2 class="auth-form__heading">会員情報登録</h2>
        <!-- Name -->
        <div class="auth-form__item">
            <x-input-label for="name" :value="__('Name')" /><br>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="auth-form__item">
            <x-input-label for="email" :value="__('Email')" /><br>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="auth-form__item">
            <x-input-label for="password" :value="__('Password')" /><br>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="auth-form__item">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" /><br>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="auth-form__item">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="auth-form__item flex-col">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('アカウントをお持ちの方はこちら') }}
            </a>
        </div>
    </form>
</x-guest-layout>
