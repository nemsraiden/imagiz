@extends('app')

@section('content')

    <h1>Albums photos << {{ $album->nom }} >></h1>
    @if(Session::has('success'))

        <div class="alert alert-success">{!! Session::get('success') !!}</div>

    @endif
    <br/>
    <div class="row">
        <div class="col-md-8">


            <h2 class="bordered album-photos-h2">Photos de l'album
                <div>
                    <a href="/albums/{{$album->id}}/photos" class="btn btn-primary">
                        <span class="fa  fa-camera"></span> Ajouter des photos
                    </a>
                </div>
            </h2>




            <div class="row">

                @if(empty($pictures))
                    <div class="col-md-12">
                        <p>Il n'y a aucune photo dans cette album<br/>
                                Vous pouvez ajouter des photos via le bouton supérieur
                        </p>
                    </div>
                @else
                    <!--<div class="grid">
                        @foreach($pictures as $picture)

                                <div class=" grid-item ">
                                    <a href="{{$picture['big']}}" data-ngthumb="{{$picture['thumb']}}" data-ngdesc="Description1" >
                                        {!! HTML::image($picture["thumb"], '', array('class' => 'img-responsive')) !!}
                                    </a>

                                </div>


                        @endforeach
                    </div>-->


                    <div id="nanoGallery3">
                        @foreach($pictures as $picture)

                            <a href="{{$picture['big']}}" data-ngthumb="{{$picture['thumb']}}" data-ngdesc="Description1">{!! HTML::image($picture["thumb"], '', array('class' => 'img-responsive')) !!}</a>


                        @endforeach
                    </div>

                @endif

                <!--<div class="col-md-3 ">
                    <a href="/albums/{{$album->id}}" >
                        {!! HTML::image('img/nopicture.png', $album->nom, array('class' => 'img-responsive')) !!}
                    </a>

                </div>-->


            </div>


            <hr/>

            <a href="/albums" class="btn btn-default"><span class="fa fa-arrow-left "></span> Revenir à la liste des albums</a>
        </div>

        <div class="col-md-4">

            <h2 class="bordered">Informations de l'album</h2>

            <table class="table table-condensed table-bordered">
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
                    <td>{{ ucfirst($album->mois) }} {{ $album->annee }}</td>
                </tr>

            </table>

            <a href="/albums/{{$album->id}}/edit" class="btn btn-default"><span class="fa fa-pencil"> Modifier ces données</span></a>
            <br/><br/>

            <h2 class="bordered">Gérer les membres</h2>

            <ul>
                <li>{{ $album->proprietaire_nom }}</li>
            </ul>



        </div>

    </div>


@endsection