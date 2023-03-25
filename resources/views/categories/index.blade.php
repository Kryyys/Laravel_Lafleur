@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Couleurs</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('couleurs/create') }}">Ajouter</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Couleur</th>
        </tr>

        @foreach ($couleurs as $index => $couleur)

            <tr>
                <td>{{ $index }}</td>
                <td>{{ $couleur->nom }}</td>

                <td>

                    <form action="{{ url('couleurs/'. $couleurs->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('couleurs/'. $couleurs->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('couleurs/'. $couleurs->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
