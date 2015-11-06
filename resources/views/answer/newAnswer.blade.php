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

    <p class="inputQ" style=" display: none">{!! $test !!}</p><br>

    <div class="test"></div>



        <p>
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default col-md-12"><span class="glyphicon glyphicon-ok"></span>  Terminar</button>
        </p>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                        <h4 class="modal-title" id="myModalLabel">Enviar respostas</h4>
                    </div>
                    <div class="modal-body">
                        Convirmar envio?
                    </div>
                    <div class="modal-footer">
                        {!!  Form::open(array('url' => 'responder/'.$token, 'method' => 'PUT', 'name' => 'test'))  !!}
                        <p>
                            <button type="submit" onclick="answerTest()" class="btn btn-default col-md-12"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>



    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <script src="../../js/answerTest.js"></script>

@stop



