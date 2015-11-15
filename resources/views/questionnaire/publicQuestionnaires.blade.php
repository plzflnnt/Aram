@extends('layouts.masterUser')
@section('title')
    Olá {!! Auth::user() -> name !!}
@stop

@section('menu')
    <ul class="nav navbar-nav">
        <li class="active" ><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('new/create') !!}">Criar Prova</a></li>
        <li><a href="{!! url('#') !!}">Repositório de provas</a></li>


        <li><div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" style="margin-top: 8px;" aria-expanded="true">
                    Olá {!! Auth::user() -> name  !!}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{!! url('setup') !!}"><span class="glyphicon glyphicon-wrench"></span>  Configurar conta</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{!! url('sair') !!}">Sair</a></li>
                </ul>
            </div></li>

    </ul>
@stop

@section('container')

    @if(count($provas)==0)
        <h1>Sem provas! :(</h1>
        <h4>começe clicando em Criar Prova.</h4>
    @else


        <p class="row"></p>
        <div class="well">
            <h3 class="text-center">Atividades públicas</h3>
            <div class="panel panel-default">
                <?php


                foreach($provas as $prova){
                $prova = get_object_vars($prova);

                $qId = DB::table('questionnaire')
                        ->select('id')
                        ->where('token',$prova['token'])
                        ->get();
                $qId = get_object_vars($qId['0']);
                $badge = DB::table('answers')
                        ->select('id')
                        ->where('question_id',$qId['id'])
                        ->get();
                $badge = count($badge);

                ?><div class="list-group-item btn btn-default">
                    <div class="row">
                        <div class="visible-xs-block  col-xs-12"><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                        <div class="visible-xs-block  col-xs-12 "><a href="{!! url('copyactivity/'.$prova['token']) !!}" class="glyphicon glyphicon-share-alt btn btn-default"> Adicionar as minhas atividades </a></div>

                        <div class="col-md-6 col-sm-6 visible-sm-block visible-md-block visible-lg-block "><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                        <div class="col-md-6 col-sm-6 visible-sm-block visible-md-block visible-lg-block "><a href="{!! url('copyactivity/'.$prova['token']) !!}" class="glyphicon glyphicon-share-alt btn btn-default"> Adicionar as minhas atividades</a></div>

                    </div>
                </div> <?php
                } ?>
                {{--</div>--}}
                <div class="col-md-12 text-center">{!! $provas->render() !!}</div>

            </div>

        </div>


    @endif
@stop