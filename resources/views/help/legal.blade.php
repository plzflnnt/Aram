@extends('layouts.masterUser')
@section('title')
    Aram App. Sobre nós
@stop
@section('menu')
    <ul class="nav navbar-nav">
        <li><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('about') !!}">Sobre</a></li>
        <li><a href="{!! url('ajuda') !!}">Ajuda</a></li>
    </ul>
@stop

@section('div2')


    <h1>Sobre os termos de uso e a política de privacidade do Aram.</h1>
    <div class="well-lg">
        <p>Aram é um projeto gratuito sem fins lucrativos com objetivos acadêmicos visando desenvolvimento de um projeto de software web e mobile.</p>
        <p>Os dados publicados neste site não são compartilhados entre outros usuários do Aram.</p>
        <p>Este mesmos dados podem ser utilizados para fins acadêmicos ou comerciais sem aviso prévio</p>
        <p>Aram é baseado em Laravel e Twitter Bootstrap </p>
        <p>Laravel is a trademark of Taylor Otwell. Copyright © Taylor Otwell.</p>
        <p> The MIT License (MIT)</p>
        <p>Copyright &copy Taylor Otwell</p>
        <p>Copyright &copy 2011-2015 Twitter, Inc</p>
        <p>



            Permission is hereby granted, free of charge, to any person obtaining a copy
            of this software and associated documentation files (the "Software"), to deal
            in the Software without restriction, including without limitation the rights
            to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
            copies of the Software, and to permit persons to whom the Software is
            furnished to do so, subject to the following conditions:
        </p>
            <p>The above copyright notice and this permission notice shall be included in
            all copies or substantial portions of the Software.</p>

            <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
            IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
            FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
            AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
            LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
            OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
            THE SOFTWARE.</p>
    </div>

@stop