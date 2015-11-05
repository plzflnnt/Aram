@extends('layouts.masterLogin')
@section('title')
    Sign up to ARAM
@stop

@section('div1')

    @foreach($errors->all() as $error)
        <p>{!! $error !!}</p>
    @endforeach

    <form class="col-xs-5 col-md-5 " action="{!! url('signup') !!}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input name="username" type="text" placeholder="Nome" class="form-control">
        </div>
        <div class="form-group">
            <input name="email" type="text" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <input name="password" type="password" placeholder="Senha" class="form-control">
        </div>
        <div class="form-group">
            <input name="password-repeat" type="password" placeholder="Insira novamente a senha" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Criar conta</button>
    </form>
    {{--{!!Form::open(array('url'=>'signup'))!!}--}}
    {{--<p>--}}
        {{--{!!Form::label('username','Nome')!!}--}}
        {{--{!!Form::text('username')!!}--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--{!!Form::label('email','E-mail')!!}--}}
        {{--{!!Form::email('email')!!}--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--{!!Form::label('password','Senha')!!}--}}
        {{--{!!Form::password('password')!!}--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--{!!Form::label('password-repeat','Repita a senha')!!}--}}
        {{--{!!Form::password('password-repeat')!!}--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--{!!Form::submit('Criar conta')!!}--}}
    {{--</p>--}}
    {{--{!!Form::close()!!}--}}

@stop