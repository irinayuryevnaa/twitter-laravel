@extends('layout')

@section('title') {{ 'LogIn' }} @endsection

@section('content')

    <form id="form" action="{{route('login_proc')}}" method="post">
        @csrf
        <label>Username</label>
        <input id="input" type="text" name="username" placeholder="Enter username">
            @error('username')
                <span id="error">{{ $message }}</span>
            @enderror

        <label>Password</label>
        <input id="input" type="password" name="password" placeholder="Enter password">
            @error('password')
                <span id="error">{{ $message }}</span>
            @enderror

        <button id="button" type="submit">Sign In</button>
        <p id="p" >
            Don't have an account? - <a id="a" href="{{ route('signup') }}">Sign Up!</a>
        </p>
    </form>

@endsection
