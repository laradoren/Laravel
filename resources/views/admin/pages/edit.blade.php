@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit page') }} {{$page->title}}</div>

                <div class="card-body">

                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">

                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" required minlength="5" value="{{ $page->title }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPath">Path</label>
                            <input type="text" name="path" class="form-control" id="inputPath" required minlength="5" value="{{ $page->path }}">
                        </div>
                        <div class="form-group">
                            <label for="inputContent">Please enter the main content</label>
                            <textarea class="form-control" name="main_content" id="inputContent" rows="3" required minlength="20" > {{$page->main_content}} </textarea>
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
