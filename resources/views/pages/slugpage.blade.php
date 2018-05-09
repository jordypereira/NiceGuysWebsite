@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mb-4 mt-0">{{ $page['title'] }}</h1>
        <p>{!! $page['body'] !!}</p>
    </main>
@endsection
