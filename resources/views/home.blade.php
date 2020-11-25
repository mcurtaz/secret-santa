@extends('layouts.main-layout')
@section('content')
<div id="home">
    <div class="container">

        @foreach ($identities as $identity)

            <div class="row pt-5">
                <div class="col-12 text-center">
                    <h4> {{ $identity -> name }} </h4>
                    <p class="p-0 m-0">Quest'anno dovrai fare un regalo a...</p>
                </div>
            </div>

            @if ($identity -> santa)

                <div class="row text-center">
                    <div class="col-6 offset-3 col-md-4 offset-md-4 img-wrapper p-4">
                        <img src="{{$identity -> santa -> image}}" alt="Foto">
                    </div>
                    <div class="col-12">
                        <h3>{{ $identity -> santa -> name }}</h3>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-12 py-3">
                        <h5>Desideri di {{ $identity -> santa -> name }}</h5>
                    </div>
                    @if (count($identity -> wishes))
                        @foreach ($identity -> wishes as $wish)
                            <div class="col-md-4 col-lg-3 py-2">
                                <div class="card">
                                    <div class="card-header">
                                    {{$wish -> name}}
                                    </div>
                                    <div class="card-body clearfix">
                                        <h6> 
                                            @if ($wish -> price)
                                            {{$wish -> price}} Euro
                                            @endif
                                        </h6>
                                        <p class="card-text">
                                            @if ($wish -> description)
                                                {{$wish -> description}}
                                            @else
                                                Nessuna descrizione 
                                            @endif
                                        </p>
                                        @if ($wish -> link)
                                            <a href="{{$wish -> link}}" class="float-right btn btn-primary">Link</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center pt-1 pb-3">{{ $identity -> santa -> name }} non ha ancora espresso desideri</p>
                        </div>
                    @endif
                </div>
               
                <hr>

                <div class="row pb-5">
                    <div class="col-12 py-3">
                        <h5>Suggerimenti per il regalo di {{ $identity -> santa -> name }}</h5>
                    </div>
                    @if (count($identity -> suggestions))
                        @foreach ($identity -> suggestions as $wish)
                            <div class="col-md-4 col-lg-3 py-2">
                                <div class="card">
                                    <div class="card-header">
                                    <strong>{{$wish -> name}}</strong>
                                    </div>
                                    <div class="card-body clearfix">
                                        <h6>
                                            @if ($wish -> price)
                                            {{$wish -> price}} Euro
                                            @endif
                                        </h6>
                                        <p class="card-text">
                                            @if ($wish -> description)
                                                {{$wish -> description}}
                                            @else
                                                Nessuna descrizione 
                                            @endif
                                        </p>
                                        @if ($wish -> link)
                                            <a href="{{$wish -> link}}" class="float-right btn btn-primary">Link</a>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        Suggerito da {{$wish -> whom}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center pt-1 pb-3">Per il momento nessuno ha dato dei suggerimenti per il regalo di {{ $identity -> santa -> name }}</p>
                        </div>
                    @endif
                </div>
               
            @else
            <div class="row py-5">
                <div class="col-12 text-center">
                    <form action="{{ route('set-santa') }}" method="POST">
                        @csrf
                        <input type="number" name="id" value="{{ $identity -> id }}" class="d-none">
                        <label for="set-santa-btn">Scopri a chi dovrai fare il regalo: </label>
                        <input class="btn btn-primary" type="submit" value="Scopri!" id="set-santa-btn">
                    </form>
                </div>
            </div>
            @endif
        @endforeach    
    </div> 
</div> 
@endsection