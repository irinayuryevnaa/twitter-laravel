<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class TweetController extends Controller
{
    public function index()
    {
        $tweets = DB::table('tweets')->select('tweets.text', 'tweets.created_at', 'users.username', 'tweets.id')
            ->leftJoin('users', 'users.id', '=', 'tweets.user_id')
            ->limit(10)->orderByRaw('tweets.created_at DESC')->get();

        if(\auth()->id() != null) {
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $name = $currentuser->name;

            return view('/home', ['tweets' => $tweets], ['name' => $name]);
        }

        return view('/home', ['tweets' => $tweets]);

    }

    public function post()
    {
        $id =Auth::user()->id;
        $currentuser = User::find($id);
        $name = $currentuser->name;

        return view('/layouts/post', ['name' => $name]);
    }

    public function post_check(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|max:280',
        ]);

        $request->user()->text()->create($data);

//        $post = new Tweet();
//        $post->text = $request->input('text');
//        $post->save();

        return redirect(route('home'));
    }

    public function destroy($id)
    {
        Tweet::find($id)->delete();

        return redirect(route('home'));
    }

//    public function destroy(Tweet $tweet)
//    {
//        $tweet->delete();
//
//        return redirect(route('home'));
//    }


}
