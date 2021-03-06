@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <hr>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="list-group-item">
                <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                
                <small>Written on  {{$post->created_at}}</small>
            </div>
        @endforeach
    @else 
        <h3>No Post Found</h3>
    @endif

@endsection