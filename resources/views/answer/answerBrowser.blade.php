@extends('layouts.masterLogin')
@section('title')
    Aram App
@stop
@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('about') !!}">Sobre</a></li>
        <li class="active"><a href="#contact">Ajuda</a></li>
    </ul>
@stop

@section('div2')
    <br><br>
<div class="jumbotron">
    <div class="col-lg-6">
        {!!  Form::open(array('url' => 'responder', 'method' => 'post'))  !!}
        <div class="input-group">
        <input type="text" name="token" class="form-control" placeholder="Insira o token da atuvidade para começar">
      <span class="input-group-btn">
        <button class="btn btn-default"  type="submit">Go!</button>
      </span>
        </div><!-- /input-group -->
        {!! Form::close() !!}
    </div><!-- /.col-lg-6 -->
    @foreach($errors->all() as $error)
        <div class="alert alert-warning" role="alert">{!! $error !!}</div>
    @endforeach
</div>

@stop