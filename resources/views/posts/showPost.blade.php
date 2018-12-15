@extends('layouts.app')

@section('content')

    @if($post!=null)
        <div class="list-group-item">
            <h2>{{$post->title}}</h2>
            <small>Written on  {{$post->created_at}}</small>
            <hr>
            <p>{!!$post->body!!}</p>
            
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                    <hr>
                    <div class="row">  
                            <a href="/posts/{{$post->id}}/edit" class ="col-1 btn btn-dark">Edit</a>
                            
                            {!!Form::open(['action' =>['PostController@destroy',$post->id], 'method' =>'POST','class'=>'col-2']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'col-12 btn btn-dark','onclick'=>"return confirm('Are you sure?')" ])}}
                            {!!Form::close()!!}
                        
                    </div>
                @endif
            @endif
        </div>
    @endif

@endsection