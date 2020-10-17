@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary "> 
                <input type="radio" name="options" id="option1" checked>Sort by id
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" id="option2"> Sort by title
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" id="option3"> Sort by date
            </label>
        </div>
        <div class="accordion" id="accordionExample">
        @foreach($blocks as $key=>$value)
            <div class="card h-100">
                <div class="card-header" id="{{$value->title}}">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$value->title}}{{$value->id}}"aria-controls="collapseOne">
                    {{$value->title}}  {{$value->created_at}} 
                    </button>
                </h2>
                </div>

                <div id="{{$value->title}}{{$value->id}}" class="collapse " aria-labelledby="{{$value->title}}" data-parent="#accordionExample">
                <div class="card-body">
                    <h5 class="card-text">
                        {{$value->main_content}}
                    </h5>
                    <div class="card-footer bg-transparent">
                        <button type="submit" class="btn btn-light float-right">
                            Author: {{$value->author}}
                        </button>
                        <button type="submit" class="btn btn-danger float-left">
                            Likes: {{$value->likes}}
                        </button>
                        
                    </div>
                    
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
