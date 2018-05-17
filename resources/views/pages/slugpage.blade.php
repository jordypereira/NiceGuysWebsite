@extends('layout')

@section('content')
    <div class="wrapper position-relative">
        <main class="container py-5">
            <h1 class="mb-4 mt-0">{{ $page['title'] }}</h1>
            <p>{!! $page['body'] !!}</p>

            @auth
                <div class="position-absolute admin-actions m-1">
                    <a class="btn btn-outline-dark adminButton" href="/admin/pages/{{$page['id']}}/edit">
                        <img src="{{ asset('images/pencil.png') }}" alt="Edit icon">
                    </a>
                </div>
            @endauth
        </main>
    </div>
@endsection
