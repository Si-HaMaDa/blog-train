@extends('layouts.auth')

@section('title', 'Login Page')

@section('content')
<h2>Weekly Coding Challenge #1: Sign in Form</h2>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Sign in</h1>
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Rember me</label>
            <input type="submit" value="login" name="type">

            <a href="{{ route('password.request') }}">Reset Your Password</a>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <a href="{{ route('register') }}" class="ghost" id="signUp">Sign Up</a>
            </div>
        </div>
    </div>
</div>
@endsection
