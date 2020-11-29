@extends('layouts.main-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrati</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identity" class="col-md-4 col-form-label text-md-right">Chi sei? Identificati!</label>
                            <div class="col-md-6">
                                <select class="form-control  @error('identity') is-invalid @enderror" name="identity[]" id="identity">
                                    @foreach ($identities as $identity)
                                      <option value="{{ $identity -> id }}">{{ $identity -> name }}</option>
                                    @endforeach
                                </select>
                                @error('identity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-link text-secondary" data-toggle="collapse" data-target="#childSelect" aria-expanded="true" aria-controls="childSelect">
                                    Devi fare un regalo anche in vece di un bambino?
                                </button>
                            </div>
                        </div>

                        <div class="form-group row collapse hide" id="childSelect">
                            <label for="identity" class="col-md-4 col-form-label text-md-right">Scegli bambino!</label>
                            <div class="col-md-6">
                                <select class="form-control  @error('identity') is-invalid @enderror" name="identity[]" id="identity">
                                    <option value="" selected>Nessuno</option>
                                    @foreach ($kids as $kid)
                                      <option value="{{ $kid -> id }}">{{ $kid -> name }}</option>
                                    @endforeach
                                </select>
                                @error('identity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Register') }}
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
