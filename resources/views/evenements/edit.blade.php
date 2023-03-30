<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Edit the Event")}}</h2>

                    <form action="{{route('evenements.update', $evenement->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ml-10">
                            <label for="evenement"> {{__("New name of the event")}} :</label>
                            <br><br>
                            <input type="text" name="nom_evenement" class="text-gray-900">
                            @error('evenement')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                            <br><br>
                            <label for="affiche">{{__("Display the event in the sub-menu ?")}}</label>
                            <br><br>
                            <select id="affiche" name="affiche" class="text-gray-900">
                                <option value="0" {{ !$evenement->affiche ? 'selected' : '' }}>Non affiché</option>
                                <option value="1" {{ $evenement->affiche ? 'selected' : '' }}>Affiché</option>
                            </select>
                        </div>

                        <br>
                        <div class="flex">
                            <input type="submit" value="Modifier" name="modifier" class="modifier m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                            <x-back :evenement="$evenement">
                                {{ __("Back") }}
                            </x-back>
                        </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
