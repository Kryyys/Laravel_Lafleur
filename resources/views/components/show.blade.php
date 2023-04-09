@props(['article'])
@props(['formulaire'])


@if (isset($article))
    <a href="{{route('articles.show', $article->id)}}">
    <div class="show w-20">
    <i class="fa-regular fa-eye text-white transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($formulaire))
    <a href="{{route('formulaires.show', $formulaire->id)}}">
    <div class="show w-20 text-center">
    <i class="fa-regular fa-eye text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

