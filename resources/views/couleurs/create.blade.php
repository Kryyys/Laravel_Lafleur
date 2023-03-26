<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Color') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Create a color")}}</h2>

                    <form action="{{route('couleurs.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="ml-10">
                            <label for="couleur"> {{__("Name of the new color")}} :
                                <br><br>
                                <input type="text" name="couleur" class="text-gray-900">
                                @error('couleur')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </label>
                        </div>


                        <br>
                        <div class="flex">
                            <x-create :action="route('couleurs.store')" />
                            <button class="w-18 m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                                <a href="{{route('couleurs.index')}}">
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
