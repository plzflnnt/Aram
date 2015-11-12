@extends('layouts.masterUser')
@section('title')
    Aram App. Sobre nós
@stop
@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li><a action="action" value="Back" onclick="history.go(-1);">Voltar</a></li>
        <li class="active"><a href="#contact">Visualizar prova</a></li>
    </ul>
@stop

@section('div1')

    <div class="col-xs-1 col-md-2"></div>
    <div name="ConteudoPrincipal" class="col-md-6 col-xs-12 col-lg-5 col-sm-10 ">

    <p class="inputQ" style=" display: none">{!! $id['answers'] !!}</p>
    <div class="quest">


    </div>




    </div>
    <div class="col-xs-1 col-md-2">

        <h1>Acertou {!! $id['score'] !!}% das perguntas objetivas</h1>

    </div>


    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <script src="../../js/reportRestore.js"></script>


    {{--<p class="inputQ" style=" display: none">{!! $test["quest"] !!}</p><br>--}}
    {{--<div class="visualizacao"></div>--}}


    {{--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>--}}

    {{--<script src="../../js/displayQuestions.js"></script>--}}


@stop