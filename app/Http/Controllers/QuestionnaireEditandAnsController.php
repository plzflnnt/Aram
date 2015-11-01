<?php

namespace Aram\Http\Controllers\Auth;

use Aram\User;
use Validator;
use Aram\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class QuestionnaireEditandAnsController extends Controller
{
    public function editExistingQuestionnaire($id){

    }

    public function reciveAnsByUser($token){
        return View::make("questionnaire.reciveAnsByUser");
    }






}