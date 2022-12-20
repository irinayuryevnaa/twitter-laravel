@extends('layout')

@section('title') {{'User'}} @endsection

@section('content')

    <h1 class="h1p">Profile</h1>
    <h3 class="h1p">{{$name}}</h3>


{{--@foreach($name as $n)--}}
{{--    <b>{{$n->name}}</b>--}}
{{--@endforeach--}}

    @foreach ($tweets as $tweet)
        <div id="str">
            <b>{{$tweet->created_at}}</b>
            <a href="{{route('user')}}">@ {{ $tweet->username }}</a>
            {{ $tweet->text }}
            @auth()
                <form action="{{route('destroy', $tweet->id)}}" method="get" style="display:inline">
                    <button id="button_area2" type="submit">Delete</button>
                </form>
            @endauth

        </div>
    @endforeach




@endsection
