@props(['couleur'])
@props(['evenement'])
@props(['sousCategorie'])

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
