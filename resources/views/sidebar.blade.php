
@extends('index')

<div class="container-fluid headerJumbo">
    <div class="row">
        <div class="jumbotron jumbotron-light">
            <div class="row">
                <div class="col-md-4">
                    {!! HTML::image('img/album-photos.png','imagiz.be créer vos album photos' ) !!}
                </div>
                <div class="col-md-6">
                    <h1>www.imagiz.be</h1>
                    <ul>
                        <li>Créer et gérer vos albums photos</li>
                        <li>Partager vos albums photo avec vos amis</li>
                        <li>Système de recherche avancé</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@section('app')

<div class="container" id="main">

    <div class="row">
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading">Espace membres</div>
                    <div class="panel-body">
                        @include('auth.login_form')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

