@props(['couleur'])

@if (isset($couleur))
    <a href="{{route('couleurs.edit', $couleur->id)}}">
    <div class="modifier w-20">
    <i class="fa-regular fa-pen-to-square text-gray-900 transition duration-100 ease-in-out bg-transparent hover:scale-150"></i>

    </div>
</a>
@endif




