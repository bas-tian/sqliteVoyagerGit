@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Main Page</div>

                <div class="card-body">

                    <div class="card mb-3">
                        <div class="card-header">Chapter 6</div>

                        <div class="card-body d-flex justify-content-center">
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '3',$dif = '1']) }}">
                                    {{ __('Easy') }}
                                </a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '3',$dif = '2']) }}">
                                    {{ __('Medium') }}
                                </a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '3',$dif = '3']) }}">
                                    {{ __('Hard') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">Chapter 20</div>

                        <div class="card-body d-flex justify-content-center">
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '4',$dif = '1']) }}">
                                    {{ __('Easy') }}
                                </a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '4',$dif = '2']) }}">
                                    {{ __('Medium') }}
                                </a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="{{ route('test.shows', [$chap = '4',$dif = '3']) }}">
                                    {{ __('Hard') }}
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
