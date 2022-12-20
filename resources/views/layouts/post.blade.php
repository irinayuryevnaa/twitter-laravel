@extends('layout')

@section('title'){{'Post'}}@endsection

@section('content')

    <form id="form_area" action="{{route('post_check')}}" method="post">
        @csrf
        <textarea id="textarea" name="text" placeholder="Enter your tweet"></textarea>
        @error('post')
        <span id="error">{{ $message }}</span>
        @enderror
        <br/>
{{--        <textarea id="hashtags" name="hashtags" placeholder="Enter your hashtags separated by space without #"></textarea>--}}
        <button id="button_area" type="submit">Post!</button>
    </form>



@endsection
