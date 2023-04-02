<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sub-Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__("List of all Sub-Categories")}}</h1>

                    @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif


                    <div class="flex items-center justify-center">
                        <a href="{{route('sousCategories.create')}}">
                            <div class="creer w-auto cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                            {{__("Create")}}
                            </div>
                        </a>
                    </div>



                    <div id="tableau">

                        <div class="mx-auto my-2 p-6 bg-white dark:bg-gray-800">
                            <table class="w-full">
                                <thead class="bg-gray-300 text-left text-xs font-bold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-20 px-6 py-3 text-gray-800 text-base">Id</th>
                                        <th class="w-100 px-6 py-3 text-gray-800 text-base">{{ __('Name') }}</th>
                                        <th class="w-100 px-6 py-3 text-gray-800 text-base">{{ __('Category Associated') }}</th>
                                        <th class="w-1/5 px-6 py-3 text-gray-800 text-base">{{ __('Displayed') }}</th>
                                        <th class="w-1/5 px-6 py-3 text-gray-800 text-base">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (count($sousCategories) > 0)
                                    @foreach ($sousCategories as $sousCategorie)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$sousCategorie->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$sousCategorie->nom_sous_categorie}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{ $sousCategorie->Categorie->nom_categorie }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{ $sousCategorie->affiche ? 'Affiché' : 'Non Affiché' }}</td>
                                        <td class="flex pt-4">
                                            <x-update :sousCategorie="$sousCategorie"></x-update>
                                            <x-delete :action="route('sousCategories.destroy', $sousCategorie->id)">
                                                <i class="fa-solid fa-trash text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
                                            </x-delete>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" colspan="2">{{ __('No saved sub-category') }}</td>
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
