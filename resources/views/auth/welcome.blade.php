@extends('layouts.masterLogin')
@section('title')
    ARAM - Escola do agora!
@stop

@section('div1')
    <div class="container">

        <div class="row">
            <div name="download-app" class="col-xs-12 col-sm-7 col-md-8" style="padding: 20px">
                <div class="jumbotron">
                    <h1>Responda sua prova Aram!</h1>
                    <p>Responda suas provas também no seu iPhone, iPad ou Android através do aplicativo</p>
                    <p><div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Respoder <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">iPhone/ iPad</a></li>
                            <li><a href="#">Android</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Responder agora</a></li>
                        </ul>
                    </div></p>
                </div>
            </div>

            <div name="criar-conta" class="col-xs-12 col-sm-5 col-md-4" style="padding: 30px;">

                <h3>Cadastre-se</h3>
                <h5>É gratis!</h5>
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
                        <input name="password-repeat" type="password" placeholder="Insira novamente a senha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Criar conta</button>
                </form>
                <br><br>
                <p><a href="{!!url('password') !!}">Recuperar senha esquecida</a> | <a href="#"></a>Dificuldades para usar o Aram</p>


            </div>
        </div>

    </div><!-- /.container -->

@stop