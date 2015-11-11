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

        <h1>Tudo certo!</h1>
        <h3>Até logo :)</h3>

        @else

    <h1>Pronto!</h1>
    <h2>Sua prova foi enviada com sucesso!</h2>
    <h2>Acertou: {!! round($acertos, $precision = 1) !!}%</h2>
@endif
@stop



