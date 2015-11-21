<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    {{--fonte estilo aram--}}
    <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
    {{--font-family: 'Amatic SC', cursive;--}}

    <title>
        @yield('title')
    </title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../js/ie-emulation-modes-warning.js"></script>
    @yield('script')
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{!! url('/') !!}"><img class="navbar-brand" src="../../img/logotexto.png" alt=""></a>
            {{--<a class="navbar-brand" href="{!!  url('/') !!}" style="font-family: 'Amatic SC', cursive ;">Aram app</a>--}}
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            @yield('menu')
        </div><!--/.nav-collapse -->

    </div>
</nav>

{{--Corpo personalizável--}}
@yield('div1')


{{--Estilo padrão--}}
<div class="row">
    <div class="col-xs-1 col-md-2"></div>
    <div name="ConteudoPrincipal" class="col-md-6 col-xs-12 col-lg-5 col-sm-10 ">@yield('div2')</div>
    <div class="col-xs-1 col-md-2"></div>
</div>

<div class="container">@yield('container')</div>

<div class="row">
    <h5 class="text-center">&copy Copyright Zafalon.com - Todos os direitos reservados. <a href="{!! url('legal') !!}">Termos e Privacidade</a></h5>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../js/ie10-viewport-bug-workaround.js"></script>



</body>
</html>