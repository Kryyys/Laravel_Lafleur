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


                </div>
            </div>
        </div>
</x-app-layout>
