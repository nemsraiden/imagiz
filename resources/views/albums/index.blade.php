@include('jumbotron')

@extends('sidebar')

@section('content')

    @if(Session::has('success'))

        <div class="alert alert-success">{!! Session::get('success') !!}</div>

    @endif

    <h1>Albums photos</h1>

    <hr/>

    @if(Auth::check())

        @if(empty($albums))

            <p>Vous n'avez aucun albums photo.</p>
            <p>Vous pouvez créer vos propre albums photo facilement !</p>

        @else

            <div class="row">

                 @foreach($albums as $album)

                    <div class="col-md-4 tumb">
                        <a href="/albums/{{$album->id}}" class="thumbnail">
                            {!! HTML::image('img/nopicture.png', $album->nom, array('class' => 'img-responsive')) !!}
                        </a>
                        <h4>
                            <a href="/albums/{{$album->id}}">{{ $album->nom }}</a>
                        </h4>

                    </div>


                 @endforeach

            </div>

        @endif


        <hr/>

        <a href="albums/create" class="btn btn-default"><span class="fa fa-plus"></span> Créer un nouvel album photo</a>

    @else

        <p>Vous devez être connecté pour consulter vos albums photo.</p>
        <p>Une fois connecté, vous pourrez créer vos propre albums photo facilement !</p>

    @endif





@endsection