@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $questionnaire->title }}</h1>

            <form action="/survey/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf
                @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong>{{ $question->question }}</div>

                        <div class="card-body">

                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answer as $answer)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="responses[{{ $key }}][answer_id]" id="exampleRadios1" value="{{ $answer->id }}" {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? "checked" : "" }}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                {{ $answer->answer }}
                                            </label>

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>  
                @endforeach

                <div class="card mt-4">
                <div class="card-header">Your Information</div>

                <div class="card-body">
                    <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="namehelp" placeholder="Enter Name">
                            <small id="namehelp" class="form-text text-muted">Hello what's your name</small>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Purpose</label>
                            <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="emailhelp" placeholder="Enter Email">
                            <small id="emailhelp" class="form-text text-muted">Your email please</small>

                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-dark" type="submit">Complete Survey</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
