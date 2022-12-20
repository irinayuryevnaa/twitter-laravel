@extends('layout')

@section('title') {{ 'SignUp' }} @endsection

@section('content')

    <form id="form" action="{{ route('signup_proc') }}" method="post">
        @csrf
        <label>Name</label>
        <input id="input" type="text" name="name" placeholder="Enter your name">
            @error('name')
                <span id="error">{{ $message }}</span>
            @enderror

        <label>Username</label>
        <input id="input" type="text" name="username" placeholder="Enter your username">
            @error('username')
                <span id="error">{{ $message }}</span>
            @enderror

        <label>Email</label>
        <input id="input" type="email" name="email" placeholder="Enter your email address">
            @error('email')
                <span id="error">{{ $message }}</span>
            @enderror

        <label>Password</label>
        <input id="input" type="password" name="password" placeholder="Enter your password">
            @error('password')
                <span id="error">{{ $message }}</span>
            @enderror

        <label>Confirm the password</label>
        <input id="input" type="password" name="password_confirmation" placeholder="Enter your password">
        <span id="error"></span>

        <button id="button" type="submit">Sign Up</button>

        <p id="p">
            Do you already have an account? - <a id="a" href="{{ route('login') }}">Log In!</a>
        </p>

    </form>

@endsection
