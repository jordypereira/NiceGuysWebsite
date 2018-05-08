@extends('layout')

@section('content')
    <main class="container">
        <h1>{{ $page['title'] }}</h1>
        <p>{!! $page['body'] !!}</p>
    </main>
@endsection
