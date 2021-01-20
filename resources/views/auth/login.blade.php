@extends('layouts.auth')

@section('content')
  <p class="login-box-msg">Sign in to start your session</p>
  
  <form action="{{ route('login') }}" method="post">
    @csrf

    <div class="input-group mb-3">
      <input type="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Email">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    
    @error('email')
        <span class="invalid-feedback mb-3" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="input-group mb-3">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>

    @error('password')
        <span class="invalid-feedback mb-3" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  @if (Route::has('password.request'))
    <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
    </p>
  @endif

  @if (Route::has('register'))
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new account</a>
    </p>
  @endif
@endsection
