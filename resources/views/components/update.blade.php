@props(['couleur'])
@props(['evenement'])
@props(['sousCategorie'])

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




