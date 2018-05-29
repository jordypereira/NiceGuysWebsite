@extends('layout')

@section('content')
    <div class="wrapper position-relative">
        <main class="container py-5">
            <h1 class="mb-4 mt-0">{{ $page['title'] }}</h1>
            <p>{!! $page['body'] !!}</p>

            @auth
                <div class="position-absolute admin-actions m-1">
                    <a class="btn btn-dark adminButton" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/edit.png') }}" alt="">
                    </a>
                    <div class="dropdown-menu bg-dark adminButton" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item admin-dropdown-item" href="/admin/home/{{$page['id']}}/edit?f=b" title="Edit block #{{$page['id']}}">
                            Pagina bewerken
                        </a>
                    </div>
                </div>
            @endauth
        </main>
    </div>
@endsection
