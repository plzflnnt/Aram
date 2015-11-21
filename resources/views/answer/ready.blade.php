@extends('layouts.masterLogin')
@section('title')
    Aram App
@stop
@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('about') !!}">Sobre</a></li>
        <li><a href="{!! url('ajuda') !!}">Ajuda</a></li>
    </ul>
@stop

@section('div2')

    @if($acertos == false)
<div class="jumbotron">
    <br>
        <h1 class="text-center">Tudo certo!</h1>
        <h3 class="text-center">Até logo :)</h3>
</div>
        @else
        <div class="jumbotron">
        <br>
            <h1 class="text-center">Pronto!</h1>
            <h2 class="text-center">Sua prova foi enviada com sucesso!</h2>
            <h2 class="text-center">Acertou: {!! round($acertos, $precision = 1) !!}% das objetivas.</h2>
        </div>
@endif
@stop



