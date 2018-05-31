@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4"> Bewerk home block</h1>
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

        @endswitch
    </main>
@endsection