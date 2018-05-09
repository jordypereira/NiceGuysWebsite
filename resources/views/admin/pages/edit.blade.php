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
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="mt-0 mb-4">Edit page</h1>
        <form method="post" action="{{url('admin/pages', $page['id'] )}}">
            @method('PUT')
            @csrf
            <div class="form-group mt-0 mb-4">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $page['title'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="link">Link name:</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ $page['link'] }}">
            </div>
            <div class="form-group mt-0 mb-4">
                @if (isset($headerImage))
                    <div class="collapse show multi-collapse">
                        <label>Header image:</label>
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
                                <center><input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}"></center>
                            </div>
                        @endforeach
                    </div>
                @else
                    <label for="image">Header image:</label>
                    <div>
                        @foreach($images as $image)
                            <div class="gallery-wrapper">
                                <label class="gallery-label" for="image{{$image["id"]}}">
                                    <img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt="Header Image Gallery">
                                </label>
                                <input class="gallery-radio" type="radio" name="image" id="image{{$image["id"]}}" value="{{ $image["filename"] }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="form-group mt-0 mb-4">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body">{{ $page['body'] }}</textarea>
            </div>
            <div class="form-group mt-0 mb-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Decline</a>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection