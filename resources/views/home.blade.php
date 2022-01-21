@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,f_auto,q_auto:eco,dpr_1/ikqra03zdnggljdu5vv0" style="height: 180px" class="rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-4"><strong>153</strong> posts</div>
                <div class="pr-4"><strong>23k</strong> followers</div>
                <div class="pr-4"><strong>251</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'N/A' }}</div>
            <div>{{ $user->profile->description ?? 'N/A' }}</div>
            <div class="font-weight-bold"><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
            <div class="font-weight-bold"><a href="{{ route('timeline') }}">Home</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://img-9gag-fun.9cache.com/photo/aPZ401n_460swp.webp" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://img-9gag-fun.9cache.com/photo/aVxQbpd_460swp.webp" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://img-9gag-fun.9cache.com/photo/aDD0pL9_460swp.webp" class="w-100">
        </div>
    </div>
</div>
@endsection
