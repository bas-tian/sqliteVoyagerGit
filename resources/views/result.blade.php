@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Results of your test</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ session('status') }}</p>

                                        <a href="{{ route('client.test') }}" class="btn btn-primary">Start test again</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach($results as $result)
                                <div class="card mb-3">
                                    <div class="card-header">{{ $result->name }}</div>

                                    <div class="card-body">
                                        @foreach($result->categoryQuestions as $question)
                                            <div class="card @if(!$loop->last)mb-3 @endif">
                                                <div class="card-header">{{ $question->question_text }}</div>
                                                <div class="card-body">
                                                    @foreach($question->questionOptions as $option)
                                                        @if ($option->points != 0)
                                                            @if (in_array($option->id, $selections))
                                                                <div class="alert alert-success" role="alert">
                                                                    <p class="text-secondary">{{ $option->option_text, $option->points}}</p>
                                                                </div>
                                                            @else
                                                                <div class="alert alert-success" role="alert">
                                                                    <p class="text-danger">{{ $option->option_text, $option->points}}</p>
                                                                </div>
                                                            @endif
                                                        @else
                                                            @if (in_array($option->id, $selections))
                                                                <div class="alert alert-danger" role="alert">
                                                                    <p class="text-secondary">{{ $option->option_text, $option->points}}</p>
                                                                </div>
                                                            @else
                                                                <div class="alert alert-light" role="alert">
                                                                    <p class="text-secondary">{{ $option->option_text, $option->points}}</p>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endforeach

                        <a href="{{ route('home') }}" class="btn btn-primary">TAKE ME HOME</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
