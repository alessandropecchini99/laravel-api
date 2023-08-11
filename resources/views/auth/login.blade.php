@extends('guest.layouts.base')

@section('title', 'Login')

@section('main') 

    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="current-password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            {{-- remember me --}}
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <a href="{{ route('password.request') }}">
                Forgot your password?
            </a>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection