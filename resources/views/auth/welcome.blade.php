@extends('layouts.masterLogin')
@section('title')
    Aram App Início
@stop

@section('menu')



    <ul class="nav navbar-nav">
        <li class="active"><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('about') !!}">Sobre</a></li>
        <li><a href="{!! url('ajuda') !!}">Ajuda</a></li>
    </ul>
@stop
@section('div1')

    <div class="container">

        <div class="row">
            <div name="download-app" class="col-xs-12 col-sm-7 col-md-8" style="padding: 20px">
                <div class="jumbotron">
                    <h2>Acessar atividade:</h2>


                    {!!  Form::open(array('url' => 'responder', 'method' => 'post'))  !!}
                    <div class="input-group">
                        <input type="text" name="token" class="form-control" placeholder="Insira o token da atividade">
                         <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span
                                        class="glyphicon glyphicon-search"></span></button>
                         </span>
                    </div>
                    <!-- /input-group -->
                    {!! Form::close() !!}


                    <br>
                    <br>

                    <p>Responda suas provas também no seu iPhone, iPad ou Android através do aplicativo</p>
                    <a href="#"><img src="../../img/appstore.png" style="width: 170px !important;"></a>
                    <img src="../../img/play.png" style="width: 150px !important;">
                    {{--(Em breve)--}}
                </div>

                <br>

            </div>
            <div class="col-xs-12 visible-xs-block glyphicon-align-center"><span
                        class="glyphicon-align-center glyphicon glyphicon-chevron-down"></span></div>

            <div name="criar-conta" class="col-xs-12 col-sm-5 col-md-4" style="padding: 30px;">

                <h3>Professor</h3>
                <h5>Cadastre-se para criar sua prova.</h5>

                <form action="{!! url('signup') !!}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input name="username" type="text" placeholder="Nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="email" type="text" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" placeholder="Senha" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="password-repeat" type="password" placeholder="Insira novamente a senha"
                               class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Criar conta</button>
                </form>
                <br><br>

                <p><a href="{!!url('password') !!}">Esqueci a senha</a> | <a href="{!! url('ajuda') !!}">Preciso de
                        ajuda</a></p>


            </div>
        </div>

    </div><!-- /.container -->

@stop

