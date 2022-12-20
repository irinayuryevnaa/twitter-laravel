<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
//    public function username()
//    {
//        $id =Auth::user()->id;
//        $currentuser = User::find($id);
//        $username = $currentuser->username;
//
//        return view('/layouts/user', ['username' => $username]);
//    }

    public function name()
    {
        $name = DB::table('users')->select('name')
            ->where('name','=', Auth::user()->username)->get();

        return view('/layout', ['name' => $name]);
    }

    public function index()
    {
        $tweets = DB::table('tweets')->select('tweets.text', 'tweets.created_at', 'users.username', 'tweets.id')
            ->leftJoin('users', 'users.id', '=', 'tweets.user_id')
            ->where('tweets.user_id', '=', [Auth::user()->id])
            ->limit(10)->orderByRaw('tweets.created_at DESC')->get();

//        $name = DB::table('users')->select('name')
//            ->where('name','=', Auth::user()->name)->get();

        $id =Auth::user()->id;
        $currentuser = User::find($id);
        $name = $currentuser->name;

        return view('/layouts/user', ['tweets' => $tweets], ['name' => $name]);
    }

}
