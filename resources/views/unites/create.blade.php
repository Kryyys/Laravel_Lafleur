<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Units') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Create an unit")}}</h2>

                    <form action="{{route('unites.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="ml-10">
                            <label for="unite"> {{__("Name of the new unit")}} :
                                <br><br>
                                <input type="text" name="unite" class="text-gray-900">
                                @error('unite')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </label>
                        </div>


                        <br>
                        <div>
                            <x-create :action="route('unites.store')" />
                            <button class="retour w-18 m-10 cursor-pointer">
                                <a href="{{route('unites.index')}}" class="retour">
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
