<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-applicaction-login  class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="alert alert-info text-center text-bg-light">
            <h2>Veuillez completer les champ</h2>
        </div><br />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input id="name"
                            class="capitalize borde block mt-1 w-full"
                            type="text" name="name" :value="old('name')"
                            required autofocus placeholder="Nom" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email"
                            class="border block mt-1 w-full"
                            type="email"
                            name="email" :value="old('email')"
                            required placeholder="E-mail" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="border block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Mot de passe"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="border block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required
                            placeholder="Confirmation mot de passe"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-bleu text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà inscrit?') }}
                </a>

                <x-button class="btn btn1 ml-4">
                    <script>
                    Alert:success('Félicitation', 'Vous vous êtes inscrits avec sucès');</script>
                    {{ __('Enregistrer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
