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

    <h1>Pronto!</h1>
    <h2>Sua prova foi enviada com sucesso!</h2>

@stop



