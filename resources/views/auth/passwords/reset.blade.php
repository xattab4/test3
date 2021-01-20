@extends('layouts.auth')

@section('content')
  <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

  <form action="{{ route('password.update') }}" method="post">
    @csrf
    
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="input-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
    </div>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="input-group mb-3">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="input-group mb-3">
      <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
      <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Reset password</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  @if (Route::has('login'))
    <p class="mb-1 mt-3">
        <a href="{{ route('login') }}">Login</a>
    </p>
  @endif
@endsection
