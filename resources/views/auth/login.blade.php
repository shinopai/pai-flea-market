<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form" novalidate>
        @csrf
        <h2 class="auth-form__heading">ログイン</h2>
        <!-- Email Address -->
        <div class="auth-form__item">
            <x-input-label for="email" :value="__('メールアドレス')" /><br>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="auth-form__item">
            <x-input-label for="password" :value="__('パスワード')" /><br>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="auth-form__item">
            <x-primary-button class="ms-3">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>

        <div class="auth-form__item flex-col">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('アカウントをお持ちでない方はこちら') }}
                </a>
            @endif
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('パスワードをお忘れの方はこちら') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
