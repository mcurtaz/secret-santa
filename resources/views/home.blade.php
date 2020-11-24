@extends('layouts.main-layout')
@section('content')
<div id="home">
    @foreach ($identities as $identity)
        <p> {{ $identity -> name }} </p>
        @if ($identity -> santa)

            <p> {{ $identity -> santa -> name }} </p>

            @foreach ($identity -> wishes as $item)
                {{$item -> name}}
            @endforeach

            @foreach ($identity -> suggestion as $suggestion)
                {{$suggestion -> name}}
            @endforeach
           
        @else
        <p> No santas </p>
        @endif
    @endforeach    
</div> 
@endsection