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



class UserLoginController extends Controller
{



    public function index()
    {
        return View::make('auth.welcome')->withUsers(User::all());
    }

    public function create()
    {


        if (Auth::check()) {

        $id = Auth::user() -> id;
        $provas = DB::table('questionnaire')
//            ->select('name')
            ->where('user_id', $id)
//            ->get()
            ->paginate(6);



        return View::make('auth.userHome')->withProvas($provas);

        }
        return View::make('auth.welcome');
    }

    public function store(Request $request)
    {
        $rules = array(
            'email' => 'required|exists:users',
                        'password' => 'required'

        );

        $validator = Validator::make($request->input(), $rules);

        if($validator->fails()) return Redirect::to('login')
            ->withInput(Input::except('password'))
            ->withErrors($validator);



        $credenciais = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        );
        if(Auth::attempt($credenciais,true)){
            $request=null;
            return Redirect::intended('login/create');
        }
        else{
            return Redirect::to('login')->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Auth::logout();
        return Redirect::to('login');
    }



}
