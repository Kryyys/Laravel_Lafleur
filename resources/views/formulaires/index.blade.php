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


                    <div id="tableau">

                        <div class="mx-auto my-2 p-6 bg-white dark:bg-gray-800">
                            <table class="w-full">
                                <thead class="bg-gray-300 text-left text-xs font-bold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-1/6 px-6 py-3 text-gray-800 text-base">Id</th>
                                        <th class="w-2/6 px-6 py-3 text-gray-800 text-base">{{ __("Demand's date") }}</th>
                                        <th class="w-3/6 px-6 py-3 text-gray-800 text-base">{{__('Title')}}</th>
                                        <th class="w-1/6 px-6 py-3 text-gray-800 text-base">{{__('Treaty')}}</th>
                                        <th class="w-1/6 px-6 py-3 text-gray-800 text-base">{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (count($formulaires) > 0)
                                    @foreach ($formulaires as $formulaire)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$formulaire->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{date('m/d/Y à H\hi', strtotime($formulaire->poste_le))}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$formulaire->titre_demande}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$formulaire->traite  ? 'Traité' : 'Non Traité'}}</td>
                                        <td class="flex pt-4">
                                            <x-show :formulaire="$formulaire"></x-show>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" colspan="2">{{ __('No saved color') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
</x-app-layout>
