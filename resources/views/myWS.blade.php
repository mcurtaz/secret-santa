@extends('layouts.main-layout')
@section('content')
<div id="WS">
    <div class="container">
        @foreach ($identities as $identity)
        <div class="row py-5">
            <div class="col-12 text-center">
                <h4> {{ $identity -> name }} </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 pt-3">
                <h5>I miei desideri</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-3">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Link</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($identity -> wishes))
                        @foreach ($identity -> wishes as $wish)
                            <tr>
                                <th scope="row">{{$wish -> name}}</th>
                                <td class="text-truncate">{{$wish -> description}}</td>
                                <td class="text-truncate">{{$wish -> link}}</td>
                                <td class="text-truncate">{{$wish -> price}}</td>
                                <td class="text-truncate text-center"><i data-toggle="modal" data-name="{{$wish -> name}}"data-target="#deleteWishModal" data-id="{{$wish -> id}}" class="fas fa-times del-icon"></i></td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">Non hai ancora espresso desideri</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>   
        
        <div class="row">
            <div class="col-12 py-2 text-center">
                <a class="btn btn-primary" href=" {{route('create-wish', [$identity -> id, 1])}} " role="button">Esprimi un desiderio</a>
            </div>
        </div>
            
        <hr>


        <div class="row">
            <div class="col-12 py-3">
                <h5>I miei suggerimenti</h5>
            </div>
        </div>


        <div class="row">
            <div class="col-12 py-3">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">A chi</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Link</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($identity -> suggestions)) 
                        @foreach ($identity -> suggestions as $suggestion)
                        <tr>
                            <th scope="row">{{$suggestion -> name}}</th>
                            <td class="text-truncate">{{$suggestion -> whom}}</td>
                            <td class="text-truncate">{{$suggestion -> description}}</td>
                            <td class="text-truncate">{{$suggestion -> link}}</td>
                            <td class="text-truncate">{{$suggestion -> price}}</td>
                            <td class="text-truncate text-center"><i data-id="{{$suggestion -> id}}" data-name="{{$suggestion -> name}}" data-toggle="modal" data-target="#deleteWishModal" class="fas fa-times del-icon"></i></td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">Non hai ancora dato nessun suggerimento</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>   
        <div class="row">
            <div class="col-12 py-2 text-center">
                <a class="btn btn-primary" href=" {{route('create-wish', [$identity -> id, 0])}} " role="button">Dai un suggerimento</a>
            </div>
        </div>
    @endforeach
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteWishModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Attenzione</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Vuoi davvero eliminare il desiderio/suggerimento <span id="name"></span>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
          <form action=" {{route('delete-wish')}} " method="POST">
              @csrf
                <input class="d-none" name="id" type="number" id="wishId">
                <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection