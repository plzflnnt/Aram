<?php
use Aram\Http\Controllers\Controller;


class QuestionnaireToolsController extends Controller
{


    public function editExistingQuestionnaire($id){



    }

    public function reciveAnsByUser($token){
        return View::make("questionnaire.reciveAnsByUser");
    }







}