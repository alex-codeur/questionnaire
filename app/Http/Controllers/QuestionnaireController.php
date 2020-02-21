<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

        $questionnaire = auth()->user()->questionnaire()->create($data);

        return redirect( route('questionnaires.store') . '/' . $questionnaire->id );
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answer.responses');

        //dd($questionnaire);

        return view('questionnaires.show', compact('questionnaire'));
    }
}
