@extends('layouts.masterUser')
@section('title')
    Criar novo sol
@stop

@section('div1')



    <br><br>
    {!!Form::open(array('url'=>'new'))!!}

    <div class="col-lg-2">
        <div class="form-group well">
            <label for="questionario">Nome da atividade</label><br>
            <input type="text" class="form-control" name="name" placeholder="Prova de Matemática">
            <br><input type="checkbox" name="public"><label for="public">  Desejo compartilhar esta atividade com outros professores pelo mundo.
                <a href="{!! url('ajuda') !!}">Como assim?</a></label>
        </div>
        <p>
            <button type="submit" class="btn btn-default">Próximo >></button>
        </p>
        {!!Form::close()!!}
    </div>

@stop

