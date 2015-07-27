
@extends('index')

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
                        Panel content
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

