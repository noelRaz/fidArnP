<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Il s\'agit d\'une zone sécurisée de l\'application. Veuillez confirmer votre votre mot de passe avant de continuer.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div><x-input id="password" class="border block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" 
                                placeholder="Mot de passe de confirmation"/>
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="btn btn1">
                    {{ __('Confirmer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
