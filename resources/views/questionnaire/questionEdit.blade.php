@extends('layouts.master')
@section('title')
    Criar novo sol
@stop
@section('script')
    <link rel="stylesheet" href="../../css/styleForm.css">
@stop

@section('div1')


{!! $id !!}



    {{--seleciona o tipo de questão--}}
    <div class="radio">
        <label>
            <input type="radio" name="optionsRadios" id="discursiva" value="option1" checked>
            Discursiva
        </label>
        <label>
            <input type="radio" name="optionsRadios" id="objetiva" value="option2">
            Objetiva
        </label>
    </div>

    <button class="btn btn-default" onclick="createQuest()" >Nova</button>

<div class="quest">


</div>

    {{--formulário aram--}}

    {!!Form::open(array('url'=>'new/'.$id, 'method' => 'PUT', 'id'=> 'qid'))!!}

<input type="hidden" name="questions">

    {{--enviar--}}

{{--<button type="button" onclick="makeJSON()">json</button>--}}
    <p>
        <button type="submit" onclick="makeJSON()" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>  Salvar</button>
    </p>


    {!!Form::close()!!}


    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <script src="../../js/questionnaire.js"></script>

@stop




