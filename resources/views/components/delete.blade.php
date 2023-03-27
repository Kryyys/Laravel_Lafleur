<form action="{{$action}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="delete">{!! $slot !!}</button>
</form>
