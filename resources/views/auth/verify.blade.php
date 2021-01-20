@extends('layouts.auth')

@section('content')
    <p class="login-box-msg">Verify Your Email Address</p>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <p>Before proceeding, please check your email for a verification link.</p>
    <p>If you did not receive the email</p>
    
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>
    </form>
@endsection
