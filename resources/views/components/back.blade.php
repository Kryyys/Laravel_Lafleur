@props(['couleur'])

<a href="{{route('couleurs.index', $couleur->id)}}">
    <div class="retour w-18 m-10 cursor-pointer pt-4 hover:underline">{{$slot}}</div>
</a>
