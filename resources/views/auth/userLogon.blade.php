@extends('layouts.masterLogin')
@section('title')
    Olá logado!
@stop

@section('div1')

    {!! redirect('/') !!}
    @foreach($errors->all() as $error)
        <p>{!! $error !!}</p>
    @endforeach

    {!!Form::open(array('url'=>'login'))!!}

    <div  class="form-group">
    <p>
        {!!Form::label('email','E-mail')!!}
        {!!Form::email('email','',array('required','class'=>'form-control','placeholder'=>'nome@exemplo.com'))!!}
    </p>
    </div>

    <div  class="form-group">
    <p>
        {!!Form::label('password','Senha')!!}
        {!!Form::password('password','',array('required','class'=>'form-control','placeholder'=>''))!!}
    </p>
    </div>
    <p>
        {!!Form::submit('Login')!!}
    </p>

    <a href="{!!url('password') !!}">Esqueci a senha</a>  |
    <a href="{!!url('signup') !!}">Criar Conta</a>

    {{--<h1>Usuários</h1>--}}
    {{--@foreach($users as $pessoa)--}}

        {{--<p>{!! $pessoa -> name !!}</p>--}}

    {{--@endforeach--}}




@stop