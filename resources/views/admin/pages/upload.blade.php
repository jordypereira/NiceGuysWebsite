@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Foto uploaden</h1>
        <form method="post" action="{{url('admin/upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-0 mb-4">
                <input type="file" class="form-control p-3" name="image" id="image">
                <div class="form-text text-muted">Max upload size: 2048 kB</div>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="home" name="type" type="radio" value="home">
                <label for="home">Homepage foto</label>
            </div>
            <div class="d-block mb-4">
                <input class="gallery-radio" id="header" name="type" type="radio" value="header">
                <label for="header">Header foto</label>
            </div>
            <div class="form-group mt-0 mb-4">
                <button type="submit" class="btn btn-success">Uploaden</button>
            </div>
        </form>
            @if(count($headerImages) or count($homeImages))
                <h2 class="mb-4">Uploaded images</h2>
                <div class="row">
                    <div class="col-12">
                        <h5 class="m-0 pt-4 pb-2">Header Images</h5>
                        @foreach($headerImages as $image)
                            <div class="gallery-wrapper">
                                <a href="{{ asset('images/header/'.$image["filename"]) }}" target="_blank"><img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt="" title="{{$image["filename"]}}"></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12">
                        <h5 class="m-0 pt-4 pb-2">Home Images</h5>
                        @foreach($homeImages as $image)
                            <div class="gallery-wrapper">
                                <a href="{{ asset('images/homeblock/'.$image["filename"]) }}" target="_blank"><img class="gallery-image" src="{{ asset('images/homeblock/'.$image["filename"]) }}" alt="" title="{{$image["filename"]}}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
    </main>
@endsection