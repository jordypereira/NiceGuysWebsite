@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Bewerk pagina</h1>
        <form method="post" action="{{url('admin/pages', $page['id'] )}}">
            @method('PUT')
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Titel</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $page['title'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="link">Link naam:</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ $page['link'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                @if (isset($headerImage))
                    <label><a target="_blank" href="{{ asset('images/'.$headerImage) }}">Header foto: </a></label>
                    <div id="accordion">
                        <button class="btn btn-outline-dark mb-3" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</button>
                        <button class="btn btn-outline-dark mb-3" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Upload een foto</button>
                        @if(count($images) > 0)
                            <div class="collapse" id="multiCollapseExample1">
                                @foreach($images as $image)
                                    <div class="gallery-wrapper">
                                        <label class="gallery-label" for="image{{$image["id"]}}">
                                            <img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt="Header Image Gallery">
                                        </label>
                                        <div class="text-center">
                                            <input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="collapse" id="multiCollapseExample1" style="max-height: 46px" data-parent="#accordion">
                                <div class="alert alert-danger">
                                    <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                                </div>
                            </div>
                        @endif
                        <div class="collapse" id="multiCollapseExample2" style="max-height: 64px" data-parent="#accordion">
                            <div class="form-group">
                                <input type="file" class="form-control p-3" name="upload" id="upload">
                                <input type="hidden" value="header" id="type" name="type">
                            </div>
                        </div>
                    </div>
                @else
                    <label class="d-block" for="image">Geen header foto geselecteerd (gebruikt default foto):</label>
                    <div id="accordion">
                        <button class="btn btn-outline-dark my-3" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Selecteer een foto</button>
                        <button class="btn btn-outline-dark my-3" type="button" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Upload een foto</button>
                        @if(count($images) > 0)
                            <div class="collapse">
                                @foreach($images as $image)
                                    <div class="gallery-wrapper">
                                        <label class="gallery-label" for="image{{$image["id"]}}">
                                            <img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt="Header Image Gallery">
                                        </label>
                                        <div class="text-center">
                                            <input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="collapse" id="multiCollapseExample3" style="max-height: 46px" data-parent="#accordion">
                                <div class="alert alert-danger">
                                    <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                                </div>
                            </div>
                        @endif
                        <div class="collapse" id="multiCollapseExample4" style="max-height: 64px" data-parent="#accordion">
                            <div class="form-group">
                                <input type="file" class="form-control p-3" name="upload" id="upload">
                                <input type="hidden" value="header" id="type" name="type">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body">{{ $page['body'] }}</textarea>
            </div>
            <div class="form-group mt-0 mb-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Bevestigen</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Afwijzen</a>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection