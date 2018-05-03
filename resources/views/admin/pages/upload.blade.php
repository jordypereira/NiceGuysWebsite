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
        <h1>Foto uploaden</h1>
        <form method="post" action="{{url('admin/upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control p-3" name="image" id="image">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-success">Uploaden</button>
            </div>
        </form>

        <h2 class="mb-4">Uploaded images</h2>
        <div class="gallery-wrapper mb-4">
            @foreach($images as $image)
                <a href="{{ asset('images/header/'.$image["filename"]) }}" target="_blank"><img class="gallery-image" src="{{ asset('images/header/'.$image["filename"]) }}" alt=""></a>
            @endforeach
        </div>
    </main>
@endsection