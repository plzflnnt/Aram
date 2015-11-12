<?php

namespace Aram;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{

    protected $fillable = ['question_id','name','answers','score'];
}
