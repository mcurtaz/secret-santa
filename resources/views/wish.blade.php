@extends('layouts.main-layout')
@section('content')
<div class="container margin-top">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 pt-3">
            <div class="card shadow border-dark">
                <div class="card-header">
                    @if ($wish)
                        Nuovo Desiderio
                    @else
                        Nuovo Suggerimento
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action=" {{route('store-wish')}}">
                        @csrf

                        <input class="d-none" type="number" name="author" value="{{$id}}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione</label>
                            <div class="col-md-6">
                                <textarea rows="10" id="description" class="form-control @error('description') is-invalid @enderror" name="description">
                                    {{old('description')}}
                                 </textarea>
                                 @error('description')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">Link</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}">

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prezzo</label>

                            <div class="col-md-6">
                                <input id="price" type=number step=0.01 class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($wish)
                            <input class="d-none" type="number" name="target" value="{{$id}}">
                        @else
                            <div class="form-group row">
                                <label for="target" class="col-md-4 col-form-label text-md-right">Per chi?</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="target" id="target">
                                        @foreach ($identities as $identity)
                                            <option value="{{$identity -> id}}">{{$identity -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                        @endif
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="rounded btn btn-secondary">
                                    @if ($wish)
                                        Crea Desiderio
                                    @else
                                        Crea Suggerimento
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection