@extends('layouts.master')
@section('title')
    ARAM - Escola do agora!
@stop

@section('div1')
   <a href="{!!  url('login') !!}">Entrar </a>|
   <a href="{!!  url('signup') !!}"> Criar conta</a>



{{--TO-DO: ISSO PODE SER UM DEBUG PARA A HOSPEDAGEM--}}
   {{--{!!  url('sugnup') !!}--}}

@stop