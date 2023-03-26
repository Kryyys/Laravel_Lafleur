<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des Couleurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__("List of all Colors")}}</h1>

                    <div id="tableau">

                        <div class="mx-auto my-8 p-6 bg-white dark:bg-gray-800">
                            <table class="w-full">
                                <thead class="bg-gray-300 text-left text-xs font-bold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-1/5 px-6 py-3 text-gray-800 text-base">Id</th>
                                        <th class="w-4/5 px-6 py-3 text-gray-800 text-base">Nom</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (count($couleurs) > 0)
                                    @foreach ($couleurs as $couleur)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$couleur->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$couleur->couleur}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" colspan="2">Je n'ai pas de couleurs.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
