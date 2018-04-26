@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="u-wrapper">
        <main class="u-container">
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
            <h1>Edit page {{ $page['title'] }}</h1>
            <form method="post" action="{{url('admin/pages', $page['id'] )}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $page['title'] }}">
                </div>
                <div class="form-group">
                    <label for="link">Link name:</label>
                    <input type="text" class="form-control" name="link" id="link">
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body" id="body">{{ $page['body'] }}</textarea>
                </div>
                <div class="form-group" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" href="{{ URL::previous() }}">Decline</a>
                </div>
                <script>
                    CKEDITOR.replace('body');
                </script>
            </form>
        </main>
    </div>
@endsection