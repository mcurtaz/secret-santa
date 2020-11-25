@extends('layouts.main-layout')
@section('content')
<div id="WS">
    @foreach ($identities as $identity)
        <h2> {{$identity -> name }} </h2>
        <p>I miei desideri</p>
        @foreach ($identity -> wishes as $wish)
            <p>{{$wish -> name}}</p>
        @endforeach
        <a class="btn btn-primary" href=" {{route('create-wish', [$identity -> id, 1])}} " role="button">Nuovo Desiderio</a>
        <p>I miei suggerimenti</p>
        @foreach ($identity -> suggestions as $suggestion)
            <p>{{$suggestion -> name}}</p>
        @endforeach
        <a class="btn btn-primary" href="{{route('create-wish', [$identity -> id, 0])}}" role="button">Nuovo suggerimento</a>
    @endforeach
</div> 
@endsection