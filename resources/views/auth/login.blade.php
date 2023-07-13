@extends('guest.layouts.base')

@section('contents')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" name="email" required autofocus autocomplete="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password" required autocomplete="current-password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="eCheck">
            <label class="form-check-label" for="eCheck" name="remember">Check me out</label>
        </div>

        <a href="{{ route('password.request') }}">
            Password Dimenticata?
        </a>

        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
@endsection