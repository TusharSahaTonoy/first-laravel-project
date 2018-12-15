@extends('layouts.app')

@section('content')
    <h1>Index</h1>

    <h3>
        @if(count($testArr)>0)
            <h3>the test array</h3>
            <ul class="list-group">
                @foreach($testArr as $testValue)
                    <li class="list-group-item">{{$testValue}}</li>
                @endforeach
            </ul>
        @endif
    </h3>
@endsection