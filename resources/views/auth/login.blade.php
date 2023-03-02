@extends('layouts.app')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center mb-3">
                    <img class="img-profile img-logo-login" src="{{ asset('assets/image/logo-marca.png') }}">
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" required autocomplete="current-password" placeholder="Senha">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      ENTRAR
                    </button>                    
                    <a href="{{ route('register') }}" class="btn btn-facebook btn-user btn-block">
                      CADASTRE-SE
                    </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection
