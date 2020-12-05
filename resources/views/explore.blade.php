@extends('layouts.main-layout')
@section('content')
@include('partials.handlebars-template')
<div class="container margin-top">
    <div class="row py-3">
        <div class="col-12 d-flex align-items-center flex-md-wrap overflow-auto">
            @foreach ($identities as $identity)
                <div class="id-wrapper p-2">
                    <div class="w-100 h-100 p-1 border border-dark rounded shadow id-select" data-name="{{$identity -> name}}" data-id="{{$identity -> id}}" style="background-image: url({{$identity -> image}});background-repeat:no-repeat;background-position: center center;background-size:cover;">
                        <h5 class="px-2 bg-warning rounded text-center">{{$identity -> name}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12 pt-3 pb-1">
            <h5>Desideri di <span class="name-place"></span></h5>
        </div>
    </div>
    <div class="row" id="wish-target">

    </div>

    <hr>

    <div class="row">
        <div class="col-12 pt-3 pb-1">
            <h5>Suggerimenti per <span class="name-place"></span></h5>
        </div>
    </div>
    <div class="row pb-4" id="suggestion-target">

    </div>
</div>
@endsection