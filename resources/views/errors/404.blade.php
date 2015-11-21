@extends('layouts.masterUser')
@section('title')
    Aram App.
@stop

@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
    </ul>
@stop


@section('div1')

    <br><br>
    <div class="col-md-2"></div>
    <div class="well jumbotron col-md-8">

        <h2>#404</h2>
        <h1 class="text-center">"Não foi minha culpa!"</h1>
        <h3 class="text-center">Você deve ter se perdido ou esta página não existe</h3><br>
        <h5 class="text-center"><a href="{!! url("reportError") !!}">Nos diga o que aconteceu</a> | <a href="{!! url('ajuda') !!}">Ajuda</a></h5>

    </div>

@stop