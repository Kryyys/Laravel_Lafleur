<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Forms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__("List of all demands")}}</h1>

                    @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif


                </div>
            </div>
        </div>
</x-app-layout>
