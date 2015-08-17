@include('jumbotron')

@extends('sidebar')

@section('content')



    <h1>Créer un album photo</h1>

    <hr/>


    {!! BootForm::open()->post()->action('/albums')->id('createAlbum'); !!}
    {!! BootForm::text("Nom de l'album", 'nom') !!}
    {!! BootForm::textarea('Description', 'description') !!}
    {!! BootForm::select('Annee', 'annee')->options($listYear); !!}
    {!! BootForm::select('Mois', 'mois')->options($listMonth); !!}

    {!! BootForm::submit('Enregistrer') !!}
    {!! BootForm::close() !!}






@endsection