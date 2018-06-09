@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            <span class="kiddishmedium">Bewerk home block</span>
            <a class="btn btn-danger float-md-right" href="/admin/home">Terug naar overzicht</a>
        </h1>
        @switch(request()->get('type'))
            @case(1)
                @include('admin/home/edits/title-text-image')
            @break

            @case(2)
                @include('admin/home/edits/title-text')
            @break

            @case(3)
                @include('admin/home/edits/title-image')
            @break

            @case(4)
                @include('admin/home/edits/image')
            @break

            @case(5)
                @include('admin/home/edits/video')
            @break

            @case(6)
                @include('admin/home/edits/counter')
            @break

        @endswitch
    </main>
@endsection