@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="{{ route('questionnaires.store') }}/{{ $questionnaire->id }}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" name="question[question]" class="form-control" value="{{ old('question.question') }}" id="question" aria-describedby="questionhelp" placeholder="Enter question">
                            <small id="questionhelp" class="form-text text-muted">Ask simmple question and to-the-point questions for best result.</small>

                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choice</legend>
                                <small id="choicehelp" class="form-text text-muted">Give choices that give you the mus insight into your question.</small>

                                <div>
                                    <label for="answer1">Choice 1</label>
                                    <input type="text" name="answers[][answer]" class="form-control" value="{{ old('answers.0.answer') }}" id="answer1" aria-describedby="answer1help" placeholder="Enter choice 1">
                                    
                                    @error('answers.0.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label for="answer2">Choice 2</label>
                                    <input type="text" name="answers[][answer]" class="form-control" value="{{ old('answers.1.answer') }}"id="answer2" aria-describedby="answer1help" placeholder="Enter choice 2">
                                    
                                    @error('answers.1.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label for="answer3">Choice 3</label>
                                    <input type="text" name="answers[][answer]" class="form-control" value="{{ old('answers.2.answer') }}"id="answer3" aria-describedby="answer1help" placeholder="Enter choice 3">
                                    
                                    @error('answers.2.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label for="answer4">Choice 4</label>
                                    <input type="text" name="answers[][answer]" class="form-control" value="{{ old('answers.3.answer') }}"id="answer3" aria-describedby="answer1help" placeholder="Enter choice 4">
                                    
                                    @error('answers.3.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </fieldset>

                            
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
