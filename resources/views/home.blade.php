@extends('layout')

@section('title') {{ 'Twitter' }} @endsection

@section('content')

    @foreach ($tweets as $tweet)
        <div id="str">
            <b>{{$tweet->created_at}}</b>
            <a href="">@ {{ $tweet->username }}</a>
            {{ $tweet->text }}


{{--            @auth--}}
{{--             <form action="{{route('destroy', $tweet->id)}}" method="get" style="display:inline">--}}
{{--                <button id="button_area2" type="submit">Delete</button>--}}
{{--            </form>--}}
{{--            @endauth--}}



        </div>
    @endforeach

@endsection
