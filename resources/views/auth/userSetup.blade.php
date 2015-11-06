@extends('layouts.masterUser')
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


    {!!  Form::open(array('url' => 'signup/'.Auth::user()->id, 'method' => 'DELETE'))  !!}
    <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Apagar conta</button>
    {!! Form::close() !!}
    <h2>Isso removerá todos os seus dados do nosso servidor e apagará todas as provas criadas</h2>
    <h1>Este processo não pode ser revertido!</h1>

@stop

