@extends('layouts.masterUser')
@section('title')
Olá {!! Auth::user() -> name !!}
@stop

@section('menu')
    <ul class="nav navbar-nav">
        <li class="active" ><a href="{!! url('/') !!}">Minhas provas</a></li>
        <li><a href="{!! url('new') !!}">Criar Prova</a></li>
        <li><a href="{!! url('#') !!}">Repositório de provas</a></li>
        <li><a href="{!! url('sair') !!}">Sair</a><ali>
        <li><h4 class="btn btn-default">Olá {!! Auth::user() -> name  !!}</h4></li>
    </ul>
@stop

@section('container')
    @if(Auth::check())

        <p class="row"></p>
<div class="well">



        <div class="panel panel-default list-group-item-heading">
            <p class="panel-heading">Minhas provas</p>

            <div class="">
           <?php
               foreach($provas as $prova){
               $prova = get_object_vars($prova);
               ?><div class="list-group-item">

                       <div class="row">
                           <div class="col-xs-5"><p class=""><?php echo $prova['name'];?></p></div>
                           <div class="col-xs-4"><p class=""><?php echo $prova['token'];?></p></div>
                           <div class="col-xs-1"><button class="glyphicon glyphicon-adjust btn btn-default">Editar</button></div>
                           <div class="col-xs-1"><button class="glyphicon glyphicon-remove btn btn-default">Excluir</button></div></div></div> <?php
               } ?>

           <div class="col-md-12 text-center">{!! $provas->render() !!}</div>
            </div>
        </div>




</div>
   @else

      {!! redirect('/') !!}

   @endif
@stop
