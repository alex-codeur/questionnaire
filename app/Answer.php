<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->belognsTo(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponses::class);
    }
}
