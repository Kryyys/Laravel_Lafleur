@extends('layouts.app')


@section('content')

    <h1>Couleur</h1>


    <table class="table table-bordered">

        <tr>
            <th>Couleur:</th>
            <td>{{ $couleurs->nom }}</td>
        </tr>

    </table>

@endsection
