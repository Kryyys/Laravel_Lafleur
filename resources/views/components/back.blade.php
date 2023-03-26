@props(['couleur'])

<a href="{{route('couleurs.index', $couleur->id)}}">
    <div class="retour w-18 m-10 cursor-pointer rounded-xl text-white border-2 border-white transition duration-500 ease-in-out bg-transparent hover:bg-blue-800 hover:text-white p-3">{{$slot}}</div>
</a>


