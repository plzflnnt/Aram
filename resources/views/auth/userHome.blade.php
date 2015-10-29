@extends('layouts.master')
@section('title')
oi
@stop

@section('div1')
   @if(Auth::check())


   <p> Logado como: {!! Auth::user() -> name  !!}</p>

id do usuário:{!! $id = Auth::user() -> id !!}
<br><br><br>


IMPRIME AS PROVAS DESTE USUÁRIO <br>
   <a href=""></a><?php $provas = DB::table('questionnaire')
                     ->select('*')
                     ->where('user_id', $id)
                     ->get();



        foreach($provas as $prova){
            echo $prova->name; ?><br><br><?php
        }
?>
{{--cria nova prova--}}
   <a href="{!! url('new') !!}" class="btn btn-default">Nova prova</a>





   {!!Form::open(array('url'=>'login/'.$id , 'method' => 'DELETE'))!!}

   <div class="col-lg-2">
      <p>
         <button class="btn btn-default">Sair</button>
      </p>
      </div>
      {!!Form::close()!!}
      <br>


   @else

      {!! redirect('login') !!}

   @endif
@stop
