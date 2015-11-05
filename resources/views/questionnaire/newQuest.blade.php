@extends('layouts.masterUser')
@section('title')
    Criar novo sol
@stop

@section('div1')




    {!!Form::open(array('url'=>'new'))!!}

    <div class="col-lg-2">
        <div class="form-group">
            <label for="questionario">Nome do questionário</label>
            <input type="text" class="form-control" name="name" placeholder="Prova de Matemática">
        </div>
        <p>
            <button type="submit" class="btn btn-default">Próximo >></button>
        </p>
        {!!Form::close()!!}
    </div>
    <a href="{!! url('help.login') !!}"></a>

@stop

