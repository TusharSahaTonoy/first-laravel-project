@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <hr>
    {!! Form::open(['action' => 'PostController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title:')}}
            {{Form::text('title','',['class' =>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body:')}}
            {{Form::textarea('body','',['id'=>'article-ckeditor','class' =>'form-control','placeholder'=>'Body of the post.'])}}
        </div>
        {{Form::submit('Submit',['class'=> 'btn btn-dark'])}}
    {!! Form::close() !!}

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection