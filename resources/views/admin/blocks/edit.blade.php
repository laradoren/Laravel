@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit block') }} {{$block->title}}</div>

                <div class="card-body">

                    <form action="{{ route('admin.blocks.update', [$block, $page]) }}" method="POST">

                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" required minlength="5" value="{{ $block->title }}">
                        </div>
                        <div class="form-group">
                            <label for="inputContent">Please enter the main content</label>
                            <textarea class="form-control" name="main_content" id="inputContent" rows="3" required minlength="20" > {{$block->main_content}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAuthor">Author</label>
                            <input type="text" class="form-control" name="author" id="inputAuthor" required minlength="5" value="{{ $block->author }}">
                        </div>
                        <div class="form-group">
                            <label for="inputLikes">Likes</label>
                            <input type="number" class="form-control" name="likes" id="inputLikes" required value="{{ $block->likes }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPage">Page</label>
                            <input type="number" class="form-control" name="page_id" id="inputPage" value="{{$page}}" readonly >
                        </div>
                        @csrf
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
