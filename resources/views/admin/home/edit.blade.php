@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="mt-0 mb-4">Edit home block</h1>
        <form method="post" action="{{url('admin/home', $homeblock['id'] )}}">
            @method('PUT')
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $homeblock->title }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="video">Video (embed link):</label>
                <input type="text" class="form-control" name="video" id="video"  value="{{ $homeblock->video }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <div class="collapse show multi-collapse">
                    <label>Image:</label>
                    <div class="gallery-wrapper d-block mb-4">
                        <img class="gallery-image" src="{{ asset('images/homeblock/'.$homeblock->image) }}" alt="">
                    </div>
                </div>
                <button class="btn btn-outline-dark mt-0 mb-4" data-toggle="collapse" href=".multi-collapse" type="button" aria-expanded="false" aria-controls="multi-collapse">Selecteer een andere foto</button>
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    @foreach($images as $image)
                        <div class="gallery-wrapper">
                            <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image" src="{{ asset('images/homeblock/'.$image["filename"]) }}" alt=""></label>
                            <div class="text-center">
                                <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="text">Body:</label>
                <textarea class="form-control" name="text" id="text">{{ $homeblock['text'] }}</textarea>

                {{--Dit op het element zetten voor autofocus--}}

                {{--{{($focus === "b") ? "autofocus" : ""}}--}}
                {{--{{($focus === "v") ? "autofocus" : ""}}--}}
            </div>
            <div class="form-group mt-0 mb-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Decline</a>
            </div>
            <script>
                CKEDITOR.replace('text');
            </script>
        </form>
    </main>
@endsection