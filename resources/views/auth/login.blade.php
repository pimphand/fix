@extends('layouts.back.login')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('logo.png') }}" alt="Apis Melli" class="brand-image" style="opacity: .8;width: 50px">
        <b>Animal</b>
        Care
      </a>
    </div>
    <div class="card card-outline card-teal">
      <div class="card-body login-card-body">
        <p class="login-box-msg">@lang('menu.titleLogin')</p>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="input-group mb-3">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                   name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('username')
            <div class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  @lang('menu.rememberMe')
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block">@lang('menu.login')</button>
            </div>
          </div>
        </form>
        <div class="social-auth-links text-center mb-3">
          <p>- @lang('menu.or') -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            @lang('menu.loginFacebook')
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            @lang('menu.loginGoogle')
          </a>
        </div>
        @if (Route::has('password.request'))
          <p class="mb-1">
            <a href="{{ route('password.request') }}">
              @lang('menu.forgetPassword')
            </a>
          </p>
        @endif
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">
            @lang('menu.register')
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection
