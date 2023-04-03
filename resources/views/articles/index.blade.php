<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pl-10 pr-10 pt-6 pb-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__("List of all Items")}}</h1>

                    @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="flex items-center justify-center">
                        <a href="{{route('articles.create')}}">
                            <div class="creer w-auto cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                                {{__("Create")}}
                            </div>
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-4 gap-10">
                        @foreach ($articles as $article)
                        <div class="bg-white dark:bg-gray-600 rounded-lg shadow-md p-6 mb-6">
                            <div class="flex flex-col justify-center items-center">
                                <div>
                                    <img src="../../Site_Lafleur/public/Images/{{$article->image}}" alt="{{$article->nom}}" class="w-60 h-60 object-contain rounded-lg">
                                </div>
                                <div class="text-center mt-4">
                                    <h2 class="text-xl font-bold">{{$article->nom}}</h2>
                                    <p class="text-gray-600 dark:text-gray-200">{{$article->sousCategorie->nom_sous_categorie}}</p>
                                    <p class="text-gray-600 dark:text-gray-200">{{$article->prix_unitaire}} €</p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-center items-center">
                                <x-show :article="$article" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    Voir
                                    </x-shox>
                                    <x-update :article="$article"></x-update>
                                    <x-delete :action="route('articles.destroy', $article->id)">
                                        <i class="fa-solid fa-trash text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
                                    </x-delete>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
</x-app-layout>
