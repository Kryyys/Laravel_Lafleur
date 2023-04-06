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

                    <form action="{{route('articles.update', $article->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="flex justify-around mr-40">
                            <div class="ml-10">
                                <label for="article"> {{__("New name of the item")}} :</label>
                                <br><br>
                                <input type="text" name="nom" value="{{$article->nom}}" class="text-gray-900">
                                @error('nom')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="sous_categorie_id">{{__("Sub-category of the item")}}</label>
                                <br><br>
                                <select name="sous_categorie_id" id="sous_categorie_id" class="text-gray-900">
                                    @foreach($sousCategorie as $sousCategorieArticle)
                                    <option value="{{ $sousCategorieArticle->id }}" {{ $article->sous_categorie_id == $sousCategorieArticle->id ? 'selected' : '' }}>{{ $sousCategorieArticle->nom_sous_categorie }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('sous_categorie_id')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="prix_unitaire"> {{__("New price of the item")}} :</label>
                                <br><br>
                                <input type="text" name="prix_unitaire" value="{{$article->prix_unitaire}}" class="text-gray-900">
                                @error('prix_unitaire')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="image"> {{__("New picture of the item")}} :</label>
                                <br><br>
                                <input type="text" name="image" value="{{$article->image}}" class="text-gray-900">
                                @error('image')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="quantite_dispo"> {{__("New quantity of the item")}} :</label>
                                <br><br>
                                <input type="text" name="quantite_dispo" value="{{$article->quantite_dispo}}" class="text-gray-900">
                                @error('quantite_dispo')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="promotion"> {{__("Sale item ?")}} </label>
                                <br><br>
                                <select id="promotion" name="promotion" class="text-gray-900">
                                    <option value="0" {{ !$article->promotion ? 'selected' : '' }}>Pas en promotion</option>
                                    <option value="1" {{ $article->promotion ? 'selected' : '' }}>En promotion</option>
                                </select>
                                @error('promotion')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="prix_promotion"> {{__("New price for the sale item")}} :</label>
                                <br><br>
                                <input type="text" name="prix_promotion" value="{{$article->prix_promotion}}" class="text-gray-900">
                                @error('prix_promotion')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                            </div>

                            <div class="ml-10">

                                <label for="date_inventaire"> {{__("Inventory date")}} :</label>
                                <br><br>
                                <input type="text" name="date_inventaire" value="{{$article->date_inventaire}}" class="text-gray-900">
                                @error('date_inventaire')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="poids"> {{__("Weight")}} :</label>
                                <br><br>
                                <input type="text" name="poids" value="{{$article->poids}}" class="text-gray-900">
                                @error('poids')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="taille"> {{__("Height")}} :</label>
                                <br><br>
                                <input type="text" name="taille" value="{{$article->taille}}" class="text-gray-900">
                                @error('taille')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="couleur_id">{{__("Color of the item")}} :</label>
                                <br><br>
                                <select name="couleur_id" id="couleur_id" class="text-gray-900">
                                    @foreach($couleur as $couleurId)
                                    <option value="{{ $couleurId->id }}" {{ $couleurId->couleur_id == $couleurId->id ? 'selected' : '' }}>{{ $couleurId->couleur }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('couleur_id')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="couleur_secondaire_id">{{__("Secondary color of the item")}} :</label>
                                <br><br>
                                <select name="couleur_secondaire_id" id="couleur_secondaire_id" class="text-gray-900">
                                    <option value="">Pas de couleur secondaire</option>
                                    @foreach($couleurSecondaire as $couleur)
                                    <option value="{{ $couleur->id }}" {{ $article->couleur_secondaire_id == $couleur->id ? 'selected' : '' }}>{{ $couleur->couleur }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('couleur_secondaire_id')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="unite_id">{{__("Unity of the item")}} :</label>
                                <br><br>
                                <select name="unite_id" id="unite_id" class="text-gray-900">
                                    @foreach($unite as $uniteId)
                                    <option value="{{ $uniteId->id }}" {{ $uniteId->unite_id == $uniteId->id ? 'selected' : '' }}>{{ $uniteId->unite }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('unite_id')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                                <label for="espece_id">{{__("Species of the item")}} :</label>
                                <br><br>
                                <select name="espece_id" id="espece_id" class="text-gray-900">
                                    @foreach($espece as $especeId)
                                    <option value="{{ $especeId->id }}" {{ $especeId->espece_id == $especeId->id ? 'selected' : '' }}>{{ $especeId->espece }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('espece_id')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror

                                <br><br>

                            </div>
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
