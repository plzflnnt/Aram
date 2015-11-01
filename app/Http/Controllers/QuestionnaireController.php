<?php

namespace Aram\Http\Controllers;

use Aram\User;
use Illuminate\Http\Request;
use Aram\Http\Requests;
use Aram\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class questionnaireController extends Controller
{

    public function index()
    {
        return View::make('questionnaire.new');
    }

    public function create()
    {
        return View::make('questionnaire.newQuest');
    }

    public function store(Request $request)
    {


        $id = Auth::id();
        $tokenCru = uniqid(rand(), true);
        $token = dechex($tokenCru);

       $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($request->input(), $rules);

        if($validator->fails()) return Redirect::to('new')
            ->withInput()
            ->withErrors($validator);

        DB::table('questionnaire')->insert(
            [
                'name' => $request->input('name'),
                'token' => $token,
                'user_id' => $id,
                'public' => true,
                'quest' => 1,
            ]
        );
        return Redirect::to('new/'.$token.'/edit');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return View::make('questionnaire.questionEdit')->with('id',$id);
    }

    public function update(Request $request, $id)
    {
        $input = Input::get('questions');


$input = " {\"name\":". $input."}";

        $userId = Auth::id();
        DB::table('questionnaire')
                        ->where('user_id', $userId)
                        ->where('token', $id)
                        ->update(['quest' => $input]);
        return Redirect::to('login/create');
    }

    public function destroy($id)
    {
        //
    }
}


//TODO : trazer a logica de banco das provas da view home dos usuários pra ca