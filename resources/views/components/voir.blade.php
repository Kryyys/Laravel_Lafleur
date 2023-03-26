<!-- @props(['jeu'])
@props(['categorie'])
@props(['tag'])


@if (isset($jeu))
    <a href="{{route('jeux.show', $jeu->id)}}">
    <div class="voir w-14">{{$slot}}</div>
</a>
@endif

@if (isset($categorie))
    <a href="{{route('categories.show', $categorie->id)}}">
    <div class="voir w-14">{{$slot}}</div>
</a>
@endif

@if (isset($tag))
    <a href="{{route('tags.show', $tag->id)}}">
    <div class="voir w-14">{{$slot}}</div>
</a>
@endif -->
