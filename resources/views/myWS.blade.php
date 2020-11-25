@extends('layouts.main-layout')
@section('content')
<div id="WS">
    @foreach ($identities as $identity)
        <h2> {{$identity -> name }} </h2>
        <p>I miei desideri</p>
        @foreach ($identity -> wishes as $wish)
            <p>{{$wish -> name}}</p>
        @endforeach
        <p>I miei suggerimenti</p>
        @foreach ($identity -> suggestions as $suggestion)
            <p>{{$suggestion -> name}}</p>
        @endforeach
    @endforeach
</div> 
@endsection