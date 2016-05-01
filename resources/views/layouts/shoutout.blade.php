@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

    <form class="form-group" action="{{ url('/shoutout') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Message</label>
            <textarea id="content" name="content" class="form-control" placeholder="Say something!" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-large btn-success" type="submit">Send</button>
        </div>
    </form>

@endsection