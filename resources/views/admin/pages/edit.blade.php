@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            <span class="kiddishmedium">Bewerk pagina</span>
            <a class="btn btn-danger float-md-right" href="/admin/pages">Terug naar overzicht</a>
        </h1>
        <form method="post" action="{{url('admin/pages', $page['id'] )}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Titel</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $page['title'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="color">Titel achtergrond kleur:</label>
                <input type="color" class="form-control color-input" name="color" id="color" value="{{ $page->color }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="font">Titel (tekst) kleur:</label>
                <div class="form-control p-2">
                    <div class="d-block">
                        <input class="gallery-radio" id="white" name="font" type="radio" value="white" {{ ($page->font_color == "white") ? "checked" : "" }}>
                        <label for="white" class="mb-0 ml-2">Wit</label>
                    </div>
                    <div class="d-block">
                        <input class="gallery-radio" id="black" name="font" type="radio" value="black" {{ ($page->font_color == "black") ? "checked" : "" }}>
                        <label for="black" class="mb-0 ml-2">Zwart</label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group mt-0 mb-4">
                <label for="link">Link naam:</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ $page['link'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                @if (isset($headerImage))
                    <label><a target="_blank" href="{{ asset('images/'.$headerImage) }}">Header foto: </a></label>
                @else
                    <label class="d-block" for="image">Geen header foto geselecteerd (gebruikt default foto):</label>
                @endif
                    <div id="accordion">
                        <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Selecteer een foto</button>
                        <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Upload een foto</button>
                        @if(count($images) > 0)
                            <div class="collapse" id="multiCollapseExample3" data-parent="#accordion">
                                <div class="pt-4">
                                    @foreach($images as $image)
                                        <div class="gallery-wrapper">
                                            <label class="gallery-label" for="image{{$image["id"]}}">
                                                <img class="gallery-image img-thumbnail" src="{{ asset('images/header/'.$image["filename"]) }}" alt="Header Image Gallery">
                                            </label>
                                            <div class="text-center">
                                                <input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}" {{ ($image["filename"] == $page->image) ? 'checked' : "" }}>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="collapse" id="multiCollapseExample3" data-parent="#accordion">
                                <div class="pt-4">
                                    <div class="m-0 alert alert-danger">
                                        <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="collapse" id="multiCollapseExample4" style="max-height: 88px" data-parent="#accordion">
                            <div class="pt-4">
                                <div class="form-group">
                                    <input type="file" class="form-control p-3" name="upload" id="upload">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body">{{ $page['body'] }}</textarea>
            </div>
            <div class="form-group mt-0 mb-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Bevestigen</button>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection