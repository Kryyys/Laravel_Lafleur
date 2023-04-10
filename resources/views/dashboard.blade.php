<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-700">

                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-2xl font-bold">
                        {{ __("Nice to see you again") }} {{ Auth::user()->name }} !
                    </div>

                    <br>

                    <div class="text-gray-900 dark:text-gray-100 text-center text-l italic">
                        {{ trim(strip_tags(\Illuminate\Foundation\Inspiring::quote())) }}
                    </div>

                    <br><br>

                </div>

                @php
                    $articlesRupture = false;
                    @endphp

                    @foreach ($articles as $article)
                    @if ($article->quantite_dispo <= 10) @php $articlesRupture=true; @endphp @endif @endforeach @if ($articles->count() > 0)
                        <div class="flex flex-col justify-center items-center content-center mt-10">
                            @if ($articlesRupture)
                            <span class="text-center font-bold text-red-500">ATTENTION : ces articles sont sur le point d'être en rupture !</span>
                            @endif
                            <table class="border border-red-500 mt-6 w-96">
                                <tbody>
                                    @foreach ($articles as $article)
                                    @if ($article->quantite_dispo <= 10) @php $articlesRupture=true; @endphp <tr>
                                        <td class="text-red-500 p-2"><a href="{{ route('articles.show', ['article' => $article->id]) }}" class="hover:underline">{{ $article->nom }}</a></td>
                                        <td class="text-red-500 p-2">{{ $article->quantite_dispo }} restants</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

<br>

                <div class="flex justify-center">
                    <a href="{{ route('articles.index') }}" class="hover:underline font-bold text-xl dark:text-gray-100">
                        {{ __('Manage your Items') }}
                    </a>
                </div>

                <br>

                <div class="flex justify-around">

                    <a href="{{ route('couleurs.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Color') }}
                    </a>

                    <a href="{{ route('evenements.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Events') }}
                    </a>

                    <a href="{{ route('sousCategories.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Sub-Categories') }}
                    </a>

                    <a href="{{ route('categories.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Categories') }}
                    </a>

                    <a href="{{ route('unites.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Units') }}
                    </a>

                    <a href="{{ route('especes.index') }}" class="hover:underline text-l dark:text-gray-100">
                        {{ __('Species') }}
                    </a>

                </div>

<br><br>

<div class="flex justify-center">
                    <a href="{{ route('formulaires.index') }}" class="hover:underline font-bold text-xl dark:text-gray-100">
                        {{ __('Manage your demands') }}
                        </h2>

                        <br><br>

                </div>



            </div>
        </div>
    </div>
</x-app-layout>
