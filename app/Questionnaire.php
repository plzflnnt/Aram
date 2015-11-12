<?php

namespace Aram;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    protected $table = 'questionnaire';
    protected $fillable = ['name','token','user_id','public','quest'];

}
