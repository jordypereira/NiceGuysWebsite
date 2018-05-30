@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <div class="modal fade" id="exampleModal{{$image['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>Bent u zeker dat u foto {{$image['id']}} wilt verwijderen?</p>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                        <form action="{{ route('images.destroy', $image['id']) }}" method="POST" class="d-inline-block adminButton">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"
                                    title="Delete foto #{{$image['id']}}">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="mt-0 mb-4">Foto bekijken</h1>
        <div class="row">
            <div class="col-12 mb-4">
                <a class="btn btn-primary" href="{{ URL::previous() }}">Ga terug</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$image['id']}}" title="Delete foto #{{$image['id']}}">
                    Verwijderen
                </button>
            </div>
            <div class="col-12">
                <img src="{{ asset('images/'.$image['type'].'/'.$image["filename"]) }}" alt="Image">
            </div>
        </div>

    </main>
@endsection