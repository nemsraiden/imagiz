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