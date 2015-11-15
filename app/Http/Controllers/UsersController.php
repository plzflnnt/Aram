<?php

namespace Aram\Http\Controllers;

use Aram\User;
use Illuminate\Http\Request;
use Aram\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Aram\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{


    public function index()
    {
        return View::make('auth.welcome');
    }

    public function create()
    {
    //
    }

    public function store(Request $request)
    {
        $rules = array(
            'email' => 'required|unique:users',
            'username' => 'required',
            'password' => 'required|min:6',
            'password-repeat' => 'required|same:password',
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) return Redirect::to('/')
            ->withInput(Input::except('password','password-repeat'))
            ->withErrors($validator);

        User::create(array(
            'name' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
        ));
        $credenciais = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        );
        if(Auth::attempt($credenciais)){
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

        $user = User::find($id);
        $user -> delete();
//        DB::table('user')
//            ->where('id',$id)
//            ->delete();
        return Redirect::to('/');
    }
}
