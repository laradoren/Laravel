@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($pages as $key=>$value)
        <a href="{{$value->path}}">
            <div class="col mb-4">
                <div class="card text-white bg-dark h-100">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{$value->title}}</b></h4>
                        <p class="card-text">{{$value->main_content}}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection