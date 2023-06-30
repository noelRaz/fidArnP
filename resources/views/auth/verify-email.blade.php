<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Merci pour l\'enregistrement! Avant de commencer, pourriez-vouz vérifier votre adresse e-meil en cliquant sur le lien que nous venons de vous envoyer? Si vous n\'avez pas reçu l\'e-mail, nous nous ferons un plaisir de vous envoyer un autre.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nouveau lien de vérification a été envoyer à l\'adresse que vous avez fournie lors de l\'inscription.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Renvoyer l\adresse de verification') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn1 underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Déconnexion') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
