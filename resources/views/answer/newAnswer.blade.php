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


    @foreach($prova as $questao)
        <p class="inputQ" style=" display: none">{!! $questao !!}</p><br>
    @endforeach
    <div class="quest">


    </div>



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
                        {!!  Form::open(array('url' => 'responder/'.$token, 'method' => 'PUT', 'name' => 'qid', 'onsubmit'=>'return validateForm()'))  !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" class="form-control" placeholder="Nome" name="fname">
                            <input type="text" class="form-control" placeholder="Informaçoes extras. Ex.: Turma, série, etc...">
                            <input type="hidden" name="token" value="{!! $token !!}">
                            <input type="hidden" name="device" value="browser">
                            <input type="hidden" name="questions">
                            <button type="submit" onclick="makeJSON()" class="oi btn btn-default col-md-12"><span class="glyphicon glyphicon-send"></span> Enviar</button>
                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>



    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <script src="../../js/answerTest.js"></script>

@stop



