@extends('app')

@section('content')

    <h1>Albums photos << {{ $album->nom }} >></h1>
    <br/>
    <div class="row">
        <div class="col-md-10">
            <table class="table table-condensed table-bordered">
                <tr class="primary">
                    <th colspan="2"><h2 class="bordered">Informations de l'album</h2></th>
                </tr>
                <tr>
                    <td width="120">Nom de l'album</td>
                    <td>{{ $album->nom }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $album->description }}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{ $album->mois }} / {{ $album->annee }}</td>
                </tr>
                <tr>
                    <td>Liste des membres</td>
                    <td>Raiden, ...</td>
                </tr>

            </table>

            <h2 class="bordered">Photos de l'album</h2>

            <div class="row">


                <div class="col-md-4 ">
                    <a href="/albums/{{$album->id}}" >
                        {!! HTML::image('img/nopicture.png', $album->nom, array('class' => 'img-responsive')) !!}
                    </a>

                </div>


            </div>

            <h2 class="bordered">Liste des membres de l'album</h2>

            <p>Aucun membre pour le moment</p>


            <hr/>

            <a href="/albums" class="btn btn-default"><span class="fa fa-arrow-left "></span> Revenir à la liste des albums</a>
        </div>
    </div>






@endsection