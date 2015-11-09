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


    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal">Encerrar conta</button>







    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title" id="myModalLabel">Encerrar conta</h4>
                </div>
                <div class="modal-body">
                    <h2>Isso removerá todos os seus dados do nosso servidor e apagará todas as provas criadas</h2>
                    <h1>Este processo não pode ser revertido!</h1>                </div>
                <div class="modal-footer">
                    {!!  Form::open(array('url' => 'signup/'.Auth::user()->id, 'method' => 'DELETE'))  !!}
                    <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Apagar todos os meus dados permanentemente</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

