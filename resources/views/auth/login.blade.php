<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-applicaction-login class="w-20 h-20 fill-current text-gray-500 bg-darkblue" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="alert alert-info text-center text-bg-light">
            <h2>Veuillez vous identifier ...</h2>
        </div><br />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <span class=""></span>
                <x-input id="email"
                            class="border block mt-1 bf-full w-full"
                            type="email" name="email" :value="old('email')"
                            required autofocus placeholder="E-mail"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="border block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Mot de passe"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-bleu text-sm text-gray-600">{{ __('Souvenez-vous de moi') }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if (Route::has('password.request'))
                        <a class="underline text-bleu text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 underline text-bleu text-sm text-gray-600 hover:text-gray-900">S'incrire</a>
                    @endif
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                @endif
                <x-button class="btn btn1 items-center text-center">
                    {{ __('Connexion') }}
                </x-button>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
