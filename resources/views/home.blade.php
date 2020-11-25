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
        <form id="logout-form" action="{{ route('set-santa') }}" method="POST">
            @csrf
            <input type="number" name="id" value="{{ $identity -> id }}" class="d-none">
            <label for="set-santa-btn"> {{ $identity -> name}} scopri a chi dovrai fare il regalo: </label>
            <input class="btn btn-primary" type="submit" value="Scopri!" id="set-santa-btn">
        </form>
        @endif
    @endforeach    
</div> 
@endsection