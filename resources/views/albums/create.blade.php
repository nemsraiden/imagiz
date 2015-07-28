@include('jumbotron')

@extends('sidebar')

@section('content')

    <h1>Créer un album photo</h1>

    <hr/>

    @if(Auth::check())

        <p>Vous n'avez aucun albums photo.</p>
        <p>Vous pouvez créer vos propre albums photo facilement !</p>

        <hr/>

        <a href="albums/create" class="btn btn-default"><span class="fa fa-plus"></span> Créer un nouvel album photo</a>

    @else

        <p>Vous devez être connecté pour consulter vos albums photo.</p>
        <p>Une fois connecté, vous pourrez créer vos propre albums photo facilement !</p>

    @endif





@endsection