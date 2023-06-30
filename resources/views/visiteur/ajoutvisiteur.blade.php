<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="mt-n1" >
                Visteur
                <div class="pull-right bg-gray-100 flex border rounded-lg">                
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px  sm:flex">
                        <x-nav-link :href="route('AddVisiteur')" :active="request()->routeIs('AddVisiteur')">
                            {{ __('Nouveau') }}
                        </x-nav-link>
                    </div>
                    <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('ListeVisiteur')" :active="request()->routeIs('ListeVisiteur')">
                            {{ __('Liste') }}
                        </x-nav-link>
                    </div>                
                </div>            
            </div>
        </div>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     Formulaire pour ajout visiteur!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
