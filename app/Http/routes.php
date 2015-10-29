<?php
use App\User;
//Rota para página inicial
Route::get('/', function(){
    return View::make('auth.welcome');
});

Route::resource('signup','UsersController');

Route::resource('login','UserLoginController');

//Resource para os questionários
Route::resource('new','QuestionnaireController');

// Rotas para reset pass...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('password', function(){
    return View::make('auth.password');
});

//Rota para pegar JSON da prova que o token da tela
Route::post('getJsonByToken', function(){

    $input = Input::get('token');
    $prova = DB::table('questionnaire')
        ->select('quest')
        ->where('token', $input)
        ->get();

    dd($prova);
//    return $prova;
});

//Rota para receber token da tela
Route::get('getJsonByToken', function() {

    $input = Input::get('token');
    $prova = DB::table('questionnaire')
        ->select('quest')
        ->where('token', $input)
        ->get();

//    dd($prova);
    $prova = get_object_vars($prova['0']);
echo $prova['quest'];
//    var_dump($prova);
//    return View::make('testeToken')->with('prova',$prova);
});

Route::get('retornaJSON',function(){
        return View::make('teste');

});


//TODO:fazer a edição dos formulários já existentes
//TODO:não está salvando os timestamps dos questionários
//TODO:fazer a verificação de usuário logado nas páginas internas
//TODO:fazer os layouts das paginas em que o a pessoa está logada e não está
//TODO: na página newQuest fazer uma instrução de como criar um formulário
//TODO: arrumar ROUTES  pois o app só faz requisição GET