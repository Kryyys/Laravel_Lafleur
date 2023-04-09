<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Forms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__('Demand n°')}} {{$formulaires->id}}</h1>

                    @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif

                    <br>
                    <div class="ml-20">

                        <span class="font-bold underline">{{__('Name')}} :</span> <span>{{$formulaires->nom}}</span>
                        <br><br>
                        <span class="font-bold underline">{{__('Givenname')}} :</span> <span> {{$formulaires->prenom}}</span>
                        <br><br>
                        <span class="font-bold underline">{{__('Email')}} :</span> <a href="mailto:{{$formulaires->email}}" class="hover:underline">{{$formulaires->email}}</a>
                        <br><br>
                        <span class="font-bold underline">{{__("Demand's date")}} :</span> <span> {{date('m/d/Y à H\hi', strtotime($formulaires->poste_le))}}</span>
                        <br><br>
                        <span class="font-bold underline">{{__('Demand processed')}} ?</span>

                        @if ($formulaires->traite === 0)
                        <span class="ml-4 inline-block bg-red-300 rounded-full px-3 py-1 font-semibold text-black mr-2">Non traitée</span>
                        @else
                        <span class="ml-4 inline-block bg-green-300 rounded-full px-3 py-1 font-semibold text-black mr-2">Traitée</span>
                        @endif

                        <br><br>
                        <span class="font-bold underline">{{__('Title')}} :</span> <br><span> {{$formulaires->titre_demande}}</span>
                        <br><br>
                        <span class="font-bold underline">{{__('Message')}} :</span> <br><span> {{$formulaires->message}}</span>
                    </div>
                    <br><br>

                    <div class="flex justify-center">
                        @if ($formulaires->traite === 0)
                        <form method="POST" action="{{ route('formulaires.update', $formulaires->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="traite" value="1">
                            <button type="submit" class="modifier m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">Marquée comme traitée</button>
                        </form>
                        @endif
                        <button class="retour w-18 m-10 cursor-pointer">
                                <a href="{{route('formulaires.index')}}" class="retour">
                                    {{__("Back")}}
                                </a>
                            </button>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
