@props(['couleur'])
@props(['evenement'])
@props(['sousCategorie'])
@props(['categorie'])
@props(['unite'])
@props(['espece'])
@props(['article'])

@if (isset($couleur))
    <a href="{{route('couleurs.edit', $couleur->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($evenement))
    <a href="{{route('evenements.edit', $evenement->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($sousCategorie))
    <a href="{{route('sousCategories.edit', $sousCategorie->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($categorie))
    <a href="{{route('categories.edit', $categorie->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($unite))
    <a href="{{route('unites.edit', $unite->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($espece))
    <a href="{{route('especes.edit', $espece->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif

@if (isset($article))
    <a href="{{route('articles.edit', $article->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-white transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>
    </div>
</a>
@endif




