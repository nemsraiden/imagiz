<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Imagiz</title>

    <!-- Bootstrap core CSS -->
    {!! HTML::style( asset('css/bootstrap.css') ) !!}
    {!! HTML::style( asset('css/main.css') ) !!}
    {!! HTML::style( asset('css/font-awesome.min.css') ) !!}
    {!! HTML::style( asset('css/fileinput.css') ) !!}
    {!! HTML::style( asset('css/nanogallery.css') ) !!}


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Imagiz.be</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/"><span class="fa fa-home"></span> Home</a></li>
                <li ><a href="/albums/"><span class="fa fa-camera"></span> Mes albums photos</a></li>
                <li><a href="/"><span class="fa fa-search"></span> Rechercher une photo</a></li>
            </ul>
           @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Mon compte</a>
                        <ul class="dropdown-menu">
                            <li ><a href="#"><span class="fa fa-camera"></span> Mes albums photos</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="fa fa-wrench"></span> Mes informations</a></li>
                        </ul>
                    </li>
                    <li><a href="/user/logout"><span class="fa fa-sign-out "></span> Logout</a></li>
                </ul>


            @else

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/user/login">Se connecter au site</a></li>
                </ul>

            @endif
        </div><!--/.nav-collapse -->



    </div>
</nav>



@yield('app')


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><span class="big">Imagiz.be</span></div>
            <div class="col-md-6 text-right">Created by NemSRaiden</div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/fileinput.min.js') !!}
{!! HTML::script('js/fileinput_locale_fr.js') !!}
{!! HTML::script('js/isotope.pkgd.min.js') !!}
{!! HTML::script('js/jquery.nanogallery.min.js') !!}

{!! HTML::script('js/main.js') !!}



</body>
</html>
