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

                    <h2 class="m-10 text-2xl font-bold underline">{{__("Edit the unit")}}</h2>

                    <form action="{{route('unites.update', $unite->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ml-10">
                            <label for="unite"> {{__("New name of the unit")}} :
                                <br><br>
                                <input type="text" name="unite" class="text-gray-900">
                                @error('unite')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                        </div>
                        </label>

                        <br>
                        <div class="flex">
                            <input type="submit" value="Modifier" name="modifier" class="modifier m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                            <x-back :unite="$unite">
                                {{ __("Back") }}
                            </x-back>
                        </div>
                </div>
                </form>

            </div>






        </div>
    </div>
    </div>
    </div>
</x-app-layout>
