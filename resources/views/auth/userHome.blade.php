@extends('layouts.masterUser')
@section('title')
Olá {!! Auth::user() -> name !!}
@stop

@section('menu')
    <ul class="nav navbar-nav">
        <li class="active" ><a href="{!! url('/') !!}">Início</a></li>
        <li><a href="{!! url('new/create') !!}">Criar Prova</a></li>
        <li><a href="{!! url('#') !!}">Repositório de provas</a></li>
        <li><a href="{!! url('sair') !!}">Sair</a></li>
        <li><a href="{!! url('setup') !!}" class="btn btn-default">Olá {!! Auth::user() -> name  !!}</a></li>
    </ul>
@stop

@section('container')

    @if(count($provas)==0)
    <h1>Sem provas! :(</h1>
        <h4>começe clicando em Criar Prova.</h4>
    @else


        <p class="row"></p>
<div class="well">
    <div class="panel panel-default">
           <?php
        $excluir=0;


        foreach($provas as $prova){
               $prova = get_object_vars($prova);
                $excluir++;

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
                           <div class="visible-xs-block visible-sm-block col-xs-12"><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                           <div class="visible-xs-block visible-sm-block col-xs-12"><p class="">Token: <?php echo $prova['token'];?></p></div>
                           <div class="visible-xs-block visible-sm-block col-xs-4 col-sm-4"><a href="{!! url('responder/'.$prova['token']) !!}" class="glyphicon glyphicon-stats btn btn-default">  <span class="badge">{!! $badge !!}</span> </a></div>
                           <div class="visible-xs-block visible-sm-block col-xs-4 col-sm-4"><a href="{!! url('new/'.$prova['token'].'/edit') !!}" class="glyphicon glyphicon-pencil btn btn-default"> </a></div>

                           <div class="col-md-4 col-sm-6 visible-md-block visible-lg-block "><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                           <div class="col-md-2 col-sm-6 visible-md-block visible-lg-block "><p class="">Token: <?php echo $prova['token'];?></p></div>
                           <div class="col-md-2 visible-md-block visible-lg-block "><a href="{!! url('responder/'.$prova['token']) !!}" class="glyphicon glyphicon-stats btn btn-default"> Respostas <span class="badge">{!! $badge !!}</span> </a></div>
                           <div class="col-md-2 visible-md-block visible-lg-block "><a href="{!! url('new/'.$prova['token'].'/edit') !!}" class="glyphicon glyphicon-pencil btn btn-default"> Editar</a></div>
                           <div class="col-md-1 col-xs-4 col-sm-4">

                               <!-- Button trigger modal -->
                               <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal<?php echo($excluir)?>">
                                   <span class="glyphicon glyphicon-trash"></span>  </button>
                               </button>

                               <!-- Modal -->
                               <div class="modal fade" id="myModal<?php echo($excluir);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                               <h4 class="modal-title" id="myModalLabel">Excluir prova</h4>
                                           </div>
                                           <div class="modal-body">
                                               Deseja excluir a prova: <?php echo $prova['name'];?>?
                                           </div>
                                           <div class="modal-footer">

                                               {!!  Form::open(array('url' => 'new/'.$prova['token'], 'method' => 'DELETE'))  !!}
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                               <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                                               {!! Form::close() !!}
                                           </div>
                                       </div>
                                   </div>
                               </div>

                           </div>


                       </div>
                </div> <?php
               } ?>
        {{--</div>--}}
    <div class="col-md-12 text-center">{!! $provas->render() !!}</div>

    </div>

</div>


@endif
@stop