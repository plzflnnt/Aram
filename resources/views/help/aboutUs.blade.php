@extends('layouts.masterLogin')
@section('title')
    Aram App. Sobre nós
@stop

@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li class="active"><a href="{!! url('about') !!}">Sobre</a></li>
        <li><a href="{!! url('ajuda') !!}">Ajuda</a></li>
    </ul>
@stop

@section('div2')

<h1>Sobre o Aram</h1>
<h2>O Aram...</h2>

@stop