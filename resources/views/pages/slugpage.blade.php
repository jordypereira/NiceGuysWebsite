@extends('layout')

@section('content')
    <div class="u-wrapper">
        <main class="u-container">
            <h1>{{ $page['title'] }}</h1>
            <p>{!! $page['body'] !!}</p>
        </main>
    </div>
@endsection
