@if(!Auth::check())
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
@endif

@if(Auth::check())

    Vous êtes connecté en tant que {{ Auth::user()->first_name }}. <br/>
    <br/>
    <h4>>> Albums photo</h4>
    <ul>
        <li><a href="">Album 1... </a></li>
        <li><a href="">Album 2... </a></li>
        <li><a href="">Album 3... </a></li>
        <li><a href="">Album 4... </a></li>

    </ul>
    <a href="/albums/create" class="btn btn-default">Créer un album photo</a>

    <h4>>> Mon profil</h4>
    <ul>
        <li><a href="">Modifier mon profil</a></li>
    </ul>
    <a class="btn btn-default" href="">Se déconnecter</a>


@else

<form class="form-horizontal" id="form-connexion" role="form" method="POST" action="{{ url('/user/login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-12 control-label">E-mail</label>
        <div class="col-md-12">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12 control-label">Password</label>
        <div class="col-md-12">
            <input type="password" class="form-control" name="password">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <a href="{{ url('/user/inscription') }}"class="btn btn-primary">Créer un compte</a>
            <br/>
            <a  href="{{ url('/password/email') }}">- Mot de passe oublié ?</a>
        </div>
    </div>
</form>

@endif
