@extends('layouts.main-layout')
@section('content')
<div id="home" class="margin-top">
    <div class="container">
        @if (session('error'))
        <div class="pt-3">
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif


        @foreach ($identities as $identity)

            <div class="row pt-5">
                <div class="col-12 text-center">
                    <h4> {{ $identity -> name }} </h4>
                    <p class="p-0 m-0">Quest'anno dovrai fare un regalo a...</p>
                </div>
            </div>

            @if ($identity -> santa && !$identity -> annunciazione -> done)

                <div class="row text-center">
                    <div class="col-8 offset-2 col-md-4 offset-md-4 img-wrapper p-4">
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
                                <div class="card shadow border-dark rounded">
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
                                            <a href="{{$wish -> link}}" class="float-right rounded btn btn-primary">Link</a>
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
                                <div class="card shadow border-dark rounded">
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

                <hr>

                <div class="row py-5">
                    <div class="col-12 text-center">
                            <h5 for="set-santa-btn">Hai fatto il regalo a {{$identity -> santa -> name }}? Annuncialo al mondo:</h5>
                            <button type="button" class="rounded btn btn-secondary" data-name="{{$identity -> santa -> name }}" data-id="{{ $identity -> id }}" data-toggle="modal" data-target="#annuncioModal">
                                Regalo Fatto
                            </button>
                    </div>
                </div>
               
            @elseif($identity -> santa && $identity -> annunciazione -> done)
            <div class="row text-center">
                <div class="col-6 offset-3 col-md-4 offset-md-4 img-wrapper p-4">
                    <img src="{{$identity -> santa -> image}}" alt="Foto">
                </div>
                <div class="col-12">
                    <h3>{{ $identity -> santa -> name }}</h3>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 text-center">
                       <h2>Regalo per {{$identity -> santa -> name}} già fatto il {{Carbon\Carbon::parse($identity -> annunciazione -> done_at) -> setTimezone('GMT+1') -> format('d/m/Y H:i')}}. Complimenti: missione compiuta!</h2>
                </div>
            </div>
            @else
            <div class="row py-5">
                <div class="col-12 text-center">
                    <form action="{{ route('set-santa') }}" method="POST">
                        @csrf
                        <input type="number" name="id" value="{{ $identity -> id }}" class="d-none">
                        <label for="set-santa-btn">Scopri a chi dovrai fare il regalo: </label>
                        <button id="set-santa-btn" class="rounded btn btn-secondary" type="submit">Scopri!</button>
                    </form>
                </div>
            </div>
            @endif
        @endforeach    
    </div> 
</div>



{{-- modal --}}
<div class="modal fade" id="annuncioModal" tabindex="-1" role="dialog" aria-labelledby="annuncioModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Annunciazione Annunciazione</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Se hai fatto il regalo a <span class="span-name"></span> annuncialo al mondo!</p>
            <p>Tutti sapranno che il regalo per <span class="span-name"></span> è stato fatto ma non sapranno da chi.</p>
            <p>Attenzione: fatto l'annuncio non si torna indietro.</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('santa-done') }}" method="POST">
                @csrf
            <button type="button" class="rounded btn btn-primary" data-dismiss="modal">Annulla</button>
            <input type="number" name="id" value="{{ $identity -> id }}" id="annuncioId" class="d-none">
            <button class="rounded btn btn-danger" type="submit">Annuncia</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection