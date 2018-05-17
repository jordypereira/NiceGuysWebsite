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
                    <div class="collapse show multi-collapse">
                        <label>Header foto:</label>
                        <div class="gallery-wrapper d-block mb-4">
                            <img class="gallery-image" src="{{ asset('images/'.$headerImage) }}" alt="">
                        </div>
                    </div>
                    <a class="btn btn-outline-dark mt-0 mb-4" data-toggle="collapse" href=".multi-collapse" role="button"
                       aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een andere foto</a>
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        @foreach($images as $image)
                            <div class="gallery-wrapper">
                                <label class="gallery-label" for="image{{$image["id"]}}">
                                    <img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt="Current Header Image">
                                </label>
                                <div class="text-center">
                                    <input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <label class="mb-4" for="image">Geen header foto geselecteerd (gebruik default foto):</label>
                    <div>
                        <a class="btn btn-outline-dark mt-0 mb-4" data-toggle="collapse" href=".multi-collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een andere foto</a>
                    </div>
                    @if(count($images) > 0)
                        <div class="collapse multi-collapse">
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
                        <div class="collapse multi-collapse" id="multiCollapseExample1" style="max-height: 46px" data-parent="#accordion">
                            <div class="alert alert-danger">
                                <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                            </div>
                        </div>
                    @endif
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