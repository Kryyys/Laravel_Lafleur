@props(['couleur'])
@props(['evenement'])
@props(['sousCategorie'])
@props(['categorie'])
@props(['unite'])
@props(['espece'])
@props(['article'])
@props(['formulaire'])

@if (isset($couleur))
<a href="{{route('couleurs.index', $couleur->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($evenement))
<a href="{{route('evenements.index', $evenement->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($sousCategorie))
<a href="{{route('sousCategories.index', $sousCategorie->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($categorie))
<a href="{{route('categories.index', $categorie->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($unite))
<a href="{{route('unites.index', $unite->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($espece))
<a href="{{route('especes.index', $espece->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($article))
<a href="{{route('articles.index', $article->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

@if (isset($formulaire))
<a href="{{route('formulaires.index', $formulaire->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
@endif

