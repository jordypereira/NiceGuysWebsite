@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Voeg een home block toe</h1>
        <form method="post" action="{{url('admin/home')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Titel:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="video">Video (embed link):</label>
                <input type="text" class="form-control" name="video" id="video" placeholder="https://www.youtube.com/embed/5IpYOF4Hi6Q" value="{{ old('video') }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label class="d-block" for="image">Foto</label>
                <div id="accordion">
                    <button class="btn btn-outline-dark my-3" type="button" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</button>
                    <button class="btn btn-outline-dark my-3" type="button" data-toggle="collapse" href="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Upload een foto</button>

                    @if(count($images) > 0)
                        <div class="collapse multi-collapse" id="multiCollapseExample1" data-parent="#accordion">
                            @foreach($images as $image)
                                <div class="gallery-wrapper">
                                    <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image" src="{{ asset('images/homeblock/'.$image["filename"]) }}" alt=""></label>
                                    <div class="text-center">
                                        <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}">
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
                    <div class="collapse" id="multiCollapseExample2" style="max-height: 64px" data-parent="#accordion">
                        <div class="form-group">
                            <input type="file" class="form-control p-3" name="upload" id="upload">
                            <input type="hidden" value="home" id="type" name="type">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="text">Tekst:</label>
                <textarea type="text" class="form-control" name="text" id="text">{{ old('text') }}</textarea>
            </div>
            <div class="form-group mt-0 mb-4">
                <button type="submit" class="btn btn-success">Bevestigen</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Afwijzen</a>
            </div>
            <script>
                CKEDITOR.replace('text');
            </script>
        </form>
    </main>
@endsection