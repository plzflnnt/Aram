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


        <p class="row"></p>
<div class="well">
    <div class="panel panel-default">
           <?php
               foreach($provas as $prova){
               $prova = get_object_vars($prova);
               ?><div class="list-group-item btn btn-default">
                       <div class="row">
                           <div class="col-md-4 col-sm-6 visible-md-block visible-lg-block visible-sm-block"><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                           <div class="col-md-2 col-sm-6 visible-md-block visible-lg-block visible-sm-block"><p class="">Token: <?php echo $prova['token'];?></p></div>
                           <div class="col-md-2 visible-md-block visible-lg-block "><a href="{!! url() !!}" class="glyphicon glyphicon-stats btn btn-default"> Respostas <span class="badge">0</span> </a></div>
                           <div class="col-md-2 visible-md-block visible-lg-block "><a href="{!! url('new/'.$prova['token'].'/edit') !!}" class="glyphicon glyphicon-pencil btn btn-default"> Editar</a></div>
                           <div class="col-md-1 visible-md-block visible-lg-block ">	{!!  Form::open(array('url' => 'new/'.$prova['token'], 'method' => 'DELETE'))  !!}
                               <button type="submit"  class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                               {!! Form::close() !!}
                           </div>

                           <div class="visible-xs-block col-xs-12"><a href="{!! url('new/'.$prova['token']) !!}">Prova: <?php echo $prova['name'];?></a></div>
                           <div class="visible-xs-block col-xs-12"><p class="">Token: <?php echo $prova['token'];?></p></div>
                           <div class="visible-xs-block visible-sm-block col-xs-4 col-sm-4"><a href="{!! url() !!}" class="glyphicon glyphicon-stats btn btn-default">  <span class="badge">0</span> </a></div>
                           <div class="visible-xs-block visible-sm-block col-xs-4 col-sm-4"><a href="{!! url('new/'.$prova['token'].'/edit') !!}" class="glyphicon glyphicon-pencil btn btn-default"> </a></div>
                           <div class="visible-xs-block visible-sm-block col-xs-4 col-sm-4">
                               {!!  Form::open(array('url' => 'new/'.$prova['token'], 'method' => 'DELETE'))  !!}
                               <button type="submit"  class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> </button>
                               {!! Form::close() !!}
                           </div>
                       </div>
                </div> <?php
               } ?>
        {{--</div>--}}
    <div class="col-md-12 text-center">{!! $provas->render() !!}</div>

    </div>

</div>



@stop