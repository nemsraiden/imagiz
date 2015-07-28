@include('jumbotron')

@extends('sidebar')

@section('content')



    <h1>Modifier un album photo</h1>

    <hr/>


    {!! BootForm::open()->put()->action('/albums/'.$album->id)->id('createAlbum'); !!}
    {!! BootForm::text("Nom de l'album", 'nom')->defaultValue($album->nom) !!}
    {!! BootForm::textarea('Description', 'description')->defaultValue($album->description) !!}
    {!! BootForm::select('Annee', 'annee')->options($listYear)->select($album->annee) !!}
    {!! BootForm::select('Mois', 'mois')->options($listMonth)->defaultValue($album->mois); !!}

    {!! BootForm::submit('Modifier cet album') !!}
    {!! BootForm::close() !!}






@endsection