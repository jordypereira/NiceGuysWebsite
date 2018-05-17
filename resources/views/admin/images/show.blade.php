@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Foto bekijken</h1>
        <form action="{{ route('images.destroy', $image['id']) }}" method="POST" class="d-inline-block adminButton">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-light"
                    onclick="return confirm('Ben je zeker dat je deze foto wilt verwijderen?')"
                    title="Delete foto #{{$image['id']}}">
                <img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon">
            </button>
        </form>
        <img src="{{ asset('images/'.$image['type'].'/'.$image["filename"]) }}" alt="Image">
    </main>
@endsection