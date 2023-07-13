@extends('guest.layouts.base')

@section('contents')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="name" class="form-control" id="Name" name="name" required autofocus autocomplete="name">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" name="email" required autocomplete="email"  value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <label for="Password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="Password_confirmation" name="password_confirmation" required autocomplete="new-password">
        </div>
        <a href="{{ route('login') }}">
                Already registered?
        </a>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection