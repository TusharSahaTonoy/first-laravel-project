@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <hr>
    {!! Form::open(['action' => ['PostController@update',$post->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title:')}}
            {{Form::text('title',$post->title,['class' =>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body:')}}
            {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class' =>'form-control','placeholder'=>'Body of the post.'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=> 'btn btn-dark'])}}
    {!! Form::close() !!}

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
