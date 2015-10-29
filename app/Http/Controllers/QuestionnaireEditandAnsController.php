<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
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