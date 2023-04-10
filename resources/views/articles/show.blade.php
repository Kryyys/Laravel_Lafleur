<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }} > {{$articles->nom}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{$articles->nom}}</h1>
                    <br>
                    <div class="flex justify-around items-between pr-100 pl-100">
                        <div class="text-center mt-4">
                            <p class="text-xl font-bold underline">Nom </p>
                            <p>{{$articles->nom}}</p>
                            <br>
                            <p class="text-xl font-bold underline">Sous-catégorie </p>
                            <p>{{$articles->sousCategorie->nom_sous_categorie}}</p>
                            <br>
                            <p class="text-xl font-bold underline">Evènements</p>
                            @foreach($evenements as $evenement)
                            <p class="text-gray-600 dark:text-gray-200">{{ $evenement }}</p>
                            @endforeach
                            <br>
                            <p class="text-xl font-bold underline">Prix </p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->prix_unitaire}} €</p>
                            <br>
                            <p class="text-xl font-bold underline">Quantité disponible </p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->quantite_dispo}}</p>
                            <br>
                            <p class="text-xl font-bold underline">En promotion ?</p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->promotion ? 'Oui' : 'Non' }}</p>
                        </div>
                        <div class="text-center mt-4">
                        <p class="text-xl font-bold underline">Prix en promotion </p>
                            <p class="text-gray-600 dark:text-gray-200">{{ isset($articles->prix_promotion) ? $articles->prix_promotion : "Pas de prix pour une promotion" }}</p>
                            <br>
                            <p class="text-xl font-bold underline">Date dernier inventaire </p>
                            <p class="text-gray-600 dark:text-gray-200">{{ isset($articles->date_inventaire) ? $articles->date_inventaire : "Pas d'inventaire" }}</p>
                            <br>
                            <p class="text-xl font-bold underline">Poids </p>
                            <p class="text-gray-600 dark:text-gray-200">{{ isset($articles->poids) ? $articles->poids : "Pas de poids" }}</p>
                            <br>
                            <p class="text-xl font-bold underline">Taille </p>
                            <p class="text-gray-600 dark:text-gray-200">{{ isset($articles->taille) ? $articles->taille : "Pas de taille" }}</p>
                            <br>
                            <p class="text-xl font-bold underline">Couleur </p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->couleur->couleur}}</p>
                            <br>
                            <p class="text-xl font-bold underline">Unité </p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->unite->unite}}</p>
                            <br>
                            <p class="text-xl font-bold underline">Espèce </p>
                            <p class="text-gray-600 dark:text-gray-200">{{$articles->espece->espece}}</p>
                            <br>
                        </div>
                        <div class="flex flex-col justify-around items-between">
                            <div>
                                <img src="../../../Site_Lafleur/public/Images/{{$articles->image}}" alt="{{$articles->nom}}" class="w-80 h-80 object-contain rounded-lg">
                            </div>
                            <div class="flex items-center justify-center">
                                <div>
                                    <a href="{{route('articles.edit', $articles->id)}}">
                                        <div class="modifier w-20">
                                            <i class="fa-regular fa-pen-to-square text-3xl text-white transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
                                        </div>
                                    </a>
                                </div>
                                <x-delete :action="route('articles.destroy', $articles->id)">
                                    <i class="fa-solid fa-trash text-3xl text-white transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
                                </x-delete>
                                <button class="retour w-18 m-10 cursor-pointer">
                                <a href="{{route('articles.index')}}" class="retour">
                                    {{__("Back")}}
                                </a>
                            </button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
</x-app-layout>
