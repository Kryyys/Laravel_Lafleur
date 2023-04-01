<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sub-Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Create a sub-category")}}</h2>

                    <form action="{{route('sousCategories.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="ml-10">
                            <label for="sousCategorie"> {{__("Name of the new sub-category")}} :</label>
                                <br><br>
                                <input type="text" name="nom_sous_categorie" class="text-gray-900">
                                @error('sousCategorie')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                            <br><br>
                            <label for="affiche">{{__("Display the sub-category in the sub-menu ?")}}</label>
                            <br><br>
                            <select id="affiche" name="affiche" class="text-gray-900">
                                <option value="0" {{ !$sousCategorie->affiche ? 'selected' : '' }}>Non affiché</option>
                                <option value="1" {{ $sousCategorie->affiche ? 'selected' : '' }}>Affiché</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <x-create :action="route('sousCategories.store')" />
                            <button class="retour w-18 m-10 cursor-pointer">
                                <a href="{{route('sousCategories.index')}}" class="retour">
                                    {{__("Back")}}
                                </a>
                            </button>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
