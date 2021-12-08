@extends('layouts.auth')

@section('title', 'Register Page')

@section('content')
<h2>Weekly Coding Challenge #1: Sign up Form</h2>
<div class="container right-panel-active" id="container">
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" name="name" />
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <input type="password" placeholder="Password confirmation" name="password_confirmation">
            <input type="submit" value="register" name="type">
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <a href="{{ route('login') }}" class="ghost" id="signIn">Sign In</a>
            </div>
        </div>
    </div>
</div>
@endsection
