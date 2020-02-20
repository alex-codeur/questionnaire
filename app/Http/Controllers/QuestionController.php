<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        //dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        
        //dd($question->answer()-);
        $question->answer()->createMany($data['answers']);

        return redirect(route('questionnaires.store') . '/' . $questionnaire->id);
    }
}
