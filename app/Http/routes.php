<?php
use Aram\User;
//Rota para página inicial
Route::get('/', function(){
    return View::make('auth.welcome');
});

//Rota para criar um usuário
Route::resource('signup','UsersController');

//Rota para fazer login
Route::resource('login','UserLoginController');

//Rota para criar questionario
Route::resource('new','QuestionnaireController');

//Rota para postar JSON com as respostas
Route::post('postJsonByToken', function(){
//    $input = Input::get('token');
//    $prova = DB::table('questionnaire')
//        ->select('quest')
//        ->where('token', $input)
//        ->get();
//
//    dd($prova);
//    return $prova;
});

//Rota para receber JSON com token na tela
Route::get('getJsonByToken', function() {

    $input = Input::get('token');
    $prova = DB::table('questionnaire')
        ->select('quest')
        ->where('token', $input)
        ->get();
    $prova = get_object_vars($prova['0']);
echo $prova['quest'];

});

// Rotas para recuperar senha
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('password', function(){
    return View::make('auth.password');
});

//Documentação e ajuda
Route::get('about', function() {
    return View::make('help.aboutUs');
});
Route::get('ajuda', function() {
    return View::make('help.helpOverview');
});


Route::get('sair', function() {
    Auth::logout();
    return redirect('/');
});
//TODO:fazer a edição dos formulários já existentes
//TODO:não está salvando os timestamps dos questionários
//TODO:fazer a verificação de usuário logado nas páginas internas
//TODO:fazer os layouts das paginas em que o a pessoa está logada e não está
//TODO: na página newQuest fazer uma instrução de como criar um formulário
//TODO: arrumar ROUTES  pois o app só faz requisição GET