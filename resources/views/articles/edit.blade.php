<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Edit the Item")}}</h2>

                    <form action="{{route('articles.update', $article->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ml-10">
                            <label for="article"> {{__("New name of the item")}} :</label>
                            <br><br>
                            <input type="text" name="nom" class="text-gray-900">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror

                            <br><br>

                            <label for="sous_categorie_id">{{__("Sub-category of the item")}}</label>
                            <br><br>
                            <select name="sous_categorie_id" id="sous_categorie_id" class="text-gray-900">
                                @foreach($sousCategorie as $sousCategorieArticle)
                                <option value="{{ $sousCategorieArticle->id }}"
                                {{ $article->sous_categorie_id == $sousCategorieArticle->id ? 'selected' : '' }}>{{ $sousCategorieArticle->nom_sous_categorie }}
                                </option>
                                @endforeach
                            </select>
                            @error('sous_categorie_id')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror

                            <br><br>

                            <label for="prix_unitaire"> {{__("New price of the item")}} :</label>
                            <br><br>
                            <input type="text" name="prix_unitaire" class="text-gray-900">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror

                            <br><br>
                            <label for="prix_unitaire"> {{__("New picture of the item")}} :</label>
                            <br><br>


                            <label for="quantite_dispo"> {{__("New quantity of the item")}} :</label>
                            <br><br>
                            <input type="text" name="quantite_dispo" class="text-gray-900">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror

                            <br><br>

                            <label for="prix_unitaire"> {{__("Sale item ?")}} </label>
                            <br><br>
                            <input type="text" name="prix_unitaire" class="text-gray-900">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror

                            <br><br>



                        </div>

                        <br>
                        <div class="flex">
                            <input type="submit" value="Modifier" name="modifier" class="modifier m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                            <x-back :article="$article">
                                {{ __("Back") }}
                            </x-back>
                        </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
