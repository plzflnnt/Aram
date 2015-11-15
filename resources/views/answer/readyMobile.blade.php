@extends('layouts.masterMobile')
@section('title')
    Aram App
@stop


@section('div2')

    @if($acertos == false)

        <h1>Tudo certo!</h1>
        <h3>Até logo :)</h3>

        @else

    <h1>Pronto!</h1>
    <h2>Sua prova foi enviada com sucesso!</h2>
    <h2>Acertou: {!! round($acertos, $precision = 1) !!}%</h2>
@endif
@stop



