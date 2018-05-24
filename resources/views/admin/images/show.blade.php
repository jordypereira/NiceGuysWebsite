@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Foto bekijken</h1>
        <div class="row">
            <div class="col-12 mb-4">
                <a class="btn btn-primary" href="{{ URL::previous() }}">Ga terug</a>
                <form action="{{ route('images.destroy', $image['id']) }}" method="POST" class="d-inline-block adminButton">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"
                            onclick="return confirm('Ben je zeker dat je deze foto wilt verwijderen?')"
                            title="Delete foto #{{$image['id']}}">
                        Verwijderen
                    </button>
                </form>
            </div>
            <div class="col-12">
                <img src="{{ asset('images/'.$image['type'].'/'.$image["filename"]) }}" alt="Image">
            </div>
        </div>

    </main>
@endsection