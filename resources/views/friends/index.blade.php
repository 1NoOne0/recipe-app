@extends('layouts.app')

@section('content')
    <h1>My Friends</h1>
    <ul>
        @foreach($friends as $friend)
            <li>{{ $friend->username }}</li>
        @endforeach
    </ul>
@endsection
