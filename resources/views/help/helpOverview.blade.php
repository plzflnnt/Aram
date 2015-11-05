@extends('layouts.masterLogin')
@section('title')
    Aram App. Sobre nós
@stop
@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('about') !!}">Sobre</a></li>
        <li class="active"><a href="#contact">Ajuda</a></li>
    </ul>
@stop

@section('div2')

    <h1>Tópicos de ajuda:</h1>
    <h2>Primeiramente...</h2>

@stop