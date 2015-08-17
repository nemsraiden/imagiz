@extends('app')

@section('content')
    <div class="container auth-login">


        @include('left-preview')

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un compte</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Il y a des erreurs avec le formulaire.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/inscription') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  @if($errors->has('last_name')) has-error @endif ">
                                    <label class="col-md-12 control-label">Nom</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                    <label class="col-md-12 control-label">Prénom</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label class="col-md-12 control-label">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label class="col-md-12 control-label">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            <label class="col-md-12 control-label">Confirmation du password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    S'enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
