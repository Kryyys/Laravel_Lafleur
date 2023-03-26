<form action="{{$action}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="supprimer">{!! $slot !!}</button>
</form>
