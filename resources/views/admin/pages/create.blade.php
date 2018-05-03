@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Voeg een custom pagina toe</h1>
        <form method="post" action="{{url('admin/pages')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="link">Link name:</label>
                <input type="text" class="form-control" name="link" id="link">
            </div>
            <div class="form-group">
                <label class="d-block" for="image">Header Image</label>
                <a class="btn btn-outline-dark my-3" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</a>
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    @foreach($images as $image)
                        <div class="gallery-wrapper">
                            <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt=""></label>
                            <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Decline</a>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection