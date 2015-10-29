@extends('layouts.master')
@section('title')
    Sign up to ARAM
@stop

@section('div1')

    @foreach($errors->all() as $error)
        <p>{!! $error !!}</p>
    @endforeach

    {!!Form::open(array('url'=>'signup'))!!}
    <p>
        {!!Form::label('username','Nome')!!}
        {!!Form::text('username')!!}
    </p>
    <p>
        {!!Form::label('email','E-mail')!!}
        {!!Form::email('email')!!}
    </p>
    <p>
        {!!Form::label('password','Senha')!!}
        {!!Form::password('password')!!}
    </p>
    <p>
        {!!Form::label('password-repeat','Repita a senha')!!}
        {!!Form::password('password-repeat')!!}
    </p>
    <p>
        {!!Form::submit('Criar conta')!!}
    </p>
    {!!Form::close()!!}

@stop