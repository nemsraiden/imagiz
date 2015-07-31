@extends('app')

@section('content')

    <h1>Albums photos << {{ $album->nom }} >></h1>

    <div class="row">
        <div class="col-md-8">

            <h2 class="bordered">Ajouter des photos</h2>

            <p>Merci de choisir les photos que vous désirez ajouter</p>
            <p>Vous pouvez ajouter plusieurs photos simultanément</p>


            {!! Form::open(array('files'=>true)) !!}

            <input type="file" id="images_file" name="file[]" multiple="true"  />

            {!! Form::close() !!}
            <hr/>

            <a href="/albums/{{$album->id}}/" class="btn btn-default"><span class="fa fa-arrow-left "></span> Revenir à l'album photo</a>

        </div>
    </div>






@endsection