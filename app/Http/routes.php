<?php
use Aram\User;
use Aram\Questionnaire;

//Rota para página inicial
Route::get('/', function(){
    if (Auth::check()) {
        return Redirect::to('login/create');
    }
    return View::make('auth.welcome');
});

//Rota para criar um usuário
Route::resource('signup','UsersController');

//Rota para fazer login
Route::resource('login','UserLoginController');

//Rota para criar questionario
Route::resource('new','QuestionnaireController');

//Rota para postar JSON com as respostas TODO
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

//Rota para receber JSON com token na tela TODO
Route::get('getJsonByToken', function() {

    $input = Input::get('token');
    $prova = DB::table('questionnaire')
        ->select('quest')
        ->where('token', $input)
        ->get();
    $prova = get_object_vars($prova['0']);
echo $prova['quest'];

});

//Rota para responder online
Route::resource('responder','AnswerController');

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
Route::get('legal', function() {
    return View::make('help.legal');
});


//Configuração de usuário
Route::get('setup', function() {
    return View::make('auth.userSetup');
});

//visualizar resultado de um aluno
Route::get('resultado/{id}', function($id) {

    $prova = DB::table('answers')
        ->select('*')
        ->where('id',$id)
        ->get();
    $prova = get_object_vars($prova['0']);

//    var_dump($prova);

    return View::make('report.answerReport')->withId($prova);
});

//logout
Route::get('sair', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('mobileanswer/{token}', function($token){
    try{
        $test = DB::table('questionnaire')
            ->select('quest')
            ->where('token',$token)//todo fazer a pagina de erro e terminar a view do ios
            ->get();
        $test = get_object_vars($test['0']);
        return View::make('answer/newAnswerMobile')->withProva($test)->withToken($token);
    }catch (\Exception $e){
        return Redirect::to('erromobiletoken');
    }
});

Route::get('erromobiletoken', function(){
    return View::make('errors/erroMobileTokenNotFound');
});

Route::get('publicactivities', function(){
    $provas = DB::table('questionnaire')
        ->where('public', true)
        ->paginate(6);

    return View::make('questionnaire/publicQuestionnaires')->withProvas($provas);
});

Route::get('copyactivity/{token}', function($tokenProva){
    $prova = DB::table('questionnaire')
        ->select('*')
        ->where('token', $tokenProva)
        ->get();

    $prova = get_object_vars($prova['0']);
    $nome = $prova['name'];
    $prova = $prova['quest'];


    //CRIA UM TOKEN PARA A PROVA
    $id = Auth::id();
    $tokenCru = rand (1000,9999);
    $token = dechex($tokenCru).$id;


    Questionnaire::create(array('name' => $nome,
        'token' => $token,
        'user_id' => $id,
        'public' => true,
        'quest' =>$prova,));

    return Redirect::to('login/create');
});


//TODO:fazer a edição dos formulários já existentes
//TODO:não está salvando os timestamps dos questionários
//TODO:fazer a verificação de usuário logado nas páginas internas
//TODO:fazer os layouts das paginas em que o a pessoa está logada e não está
//TODO: na página newQuest fazer uma instrução de como criar um formulário
//TODO: arrumar ROUTES  pois o app só faz requisição GET
//TODO: prova ativa para responder ou não
//TODO: aspas duplas estragam a prova
//TODO: só ta pegando o nome do aluno quando ele faz a prova não o resto
//TODO: fazer aparecer o nome do da prova e do professor que criou!
