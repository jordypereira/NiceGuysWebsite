@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Voeg een pagina toe</h1>
        <form method="post" action="{{url('admin/pages')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Titel:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="color">Titel achtergrond kleur:</label>
                <input type="color" class="form-control color-input" name="color" id="color" value="{{ (old('color')) ? old('color') : "#d0003a" }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="font">Titel (tekst) kleur:</label>
                <div class="form-control p-2">
                    <div class="d-block">
                        <input class="gallery-radio" id="white" name="font" type="radio" value="white" checked>
                        <label for="white" class="mb-0 ml-2">Wit</label>
                    </div>
                    <div class="d-block">
                        <input class="gallery-radio" id="black" name="font" type="radio" value="black">
                        <label for="black" class="mb-0 ml-2">Zwart</label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="link">Link naam:</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label class="d-block" for="image">Header foto:</label>
                <div id="accordion">
                    <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</button>
                    <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Upload een foto</button>
                    @if(count($images) > 0)
                        <div class="collapse" id="multiCollapseExample1" data-parent="#accordion">
                            <div class="pt-4">
                                @foreach($images as $image)
                                    <div class="gallery-wrapper">
                                        <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image img-thumbnail" src="{{ asset('images/header/'.$image["filename"]) }}" alt=""></label>
                                        <div class="text-center">
                                            <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="collapse" id="multiCollapseExample1" data-parent="#accordion">
                            <div class="pt-4">
                                <div class="m-0 alert alert-danger">
                                    <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="collapse" id="multiCollapseExample2" style="max-height: 88px" data-parent="#accordion">
                        <div class="pt-4">
                            <div class="form-group">
                                <input type="file" class="form-control p-3" name="upload" id="upload">
                                <input type="hidden" value="header" id="type" name="type">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body">{{ old('body') }}</textarea>
            </div>
            <div class="form-group mt-0 mb-4">
                <button type="submit" class="btn btn-success">Bevestigen</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection