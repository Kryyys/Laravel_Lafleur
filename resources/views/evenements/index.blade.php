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

                    <h1 class="text-center text-3xl font-bold underline pb-10">{{__("List of all Events")}}</h1>

                    @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif


                    <div class="flex items-center justify-center">
                        <a href="{{route('evenements.create')}}">
                            <div class="creer w-auto cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">
                            {{__("Create")}}
                            </div>
                        </a>
                    </div>



                    <div id="tableau">

                        <div class="mx-auto my-2 p-6 bg-white dark:bg-gray-800">
                            <table class="w-full">
                                <thead class="bg-gray-300 text-left text-xs font-bold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-1/5 px-6 py-3 text-gray-800 text-base">Id</th>
                                        <th class="w-2/5 px-6 py-3 text-gray-800 text-base">{{ __('Name') }}</th>
                                        <th class="w-1/5 px-6 py-3 text-gray-800 text-base">{{ __('Displayed') }}</th>
                                        <th class="w-2/5 px-6 py-3 text-gray-800 text-base">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (count($evenements) > 0)
                                    @foreach ($evenements as $evenement)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$evenement->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$evenement->nom_evenement}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-s font-medium text-gray-500 tracking-wider">{{$evenement->affiche ? 'Affiché' : 'Non Affiché' }}</td>
                                        <td class="flex pt-4">
                                            <x-update :evenement="$evenement"></x-update>
                                            <x-delete :action="route('evenements.destroy', $evenement->id)">
                                                <i class="fa-solid fa-trash text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
                                            </x-delete>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" colspan="2">{{ __('No saved events') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
