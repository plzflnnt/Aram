@extends('layouts.masterUser')
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


    @if(count($nomes)==0)
            <h1>Nenhuma resposta ainda :x </h1>
            <h4>Entregue este token para seu aluno responder: {!! $token !!}</h4>
        @else


<div class="well">
        <table class="table table-striped">
            <tr>Prova: {!! $prova !!}</tr>

        <?php
            foreach($nomes as $nome){
                $nome = get_object_vars($nome);
                $score = $nome['score'];
                $id = $nome['id'];
                $nome = $nome['name'];
        ?>

        <tr>
            <td><a href="{!! url('resultado/'.$id) !!}">{!! $nome !!}</a></td>
            <td>{!! round($score, $precision = 1) !!}%</td>
        </tr>



    <?php        }
    ?></table>
    <div class="col-md-12 text-center">{!! $nomes->render() !!}</div>
</div>
@endif

@stop



