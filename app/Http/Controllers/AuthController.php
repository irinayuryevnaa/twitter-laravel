<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (auth()->attempt($data))
        {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors(['username' => 'Wrong username or password']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('home'));
    }

    public function showSignupForm()
    {
        return view('/signup');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users,username|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if($user)
        {
            auth()->login($user);
        }

        return redirect(route('home'));
    }




}
