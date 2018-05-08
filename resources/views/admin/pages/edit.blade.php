@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravelckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alertclass', 'alertinfo') }}">{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
            <div class="alert alertdanger">
                <ul>
                    @foreach ($errors>all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit page {{ $page['title'] }}</h1>
        <form method="post" action="{{url('admin/pages', $page['id'] )}}">
            @method('PUT')
            @csrf
            <div class="formgroup">
                <label for="title">Title:</label>
                <input type="text" class="formcontrol" name="title" id="title" value="{{ $page['title'] }}">
            </div>
            <div class="formgroup">
                <label for="link">Link name:</label>
                <input type="text" class="formcontrol" name="link" id="link" value="{{ $page['link'] }}">
            </div>
            <div class="formgroup">
                @if (isset($headerImage))
                    <p class="mb4">Current header image:</p>
                    <div class="gallerywrapper dblock">
                        <img class="galleryimage" src="{{ asset('images/'.$headerImage) }}" alt="">
                    </div>
                    <a class="btn btnoutlinedark my4" datatoggle="collapse" href="#multiCollapseExample1" role="button"
                       ariaexpanded="false" ariacontrols="multiCollapseExample1">Selecteer een andere foto</a>
                    <div class="collapse multicollapse" id="multiCollapseExample1">
                        @foreach($images as $image)
                            <div class="gallerywrapper">
                                <label class="gallerylabel" for="image{{$image["id"]}}"><img class="galleryimage"
                                                                                             src="{{ asset('images/header/'.$image["filename"]) }}"
                                                                                             alt=""></label>
                                <input class="galleryradio" type="radio" name="image" id="image{{$image["id"]}}"
                                       value="{{ $image["filename"] }}">
                            </div>
                        @endforeach
                    </div>
                @else
                    <label for="image">Header image:</label>
                    <div>
                        @foreach($images as $image)
                            <div class="gallerywrapper">
                                <label class="gallerylabel" for="image{{$image["id"]}}"><img class="galleryimage"
                                                                                             src="{{ asset('images/header/'.$image["filename"]) }}"
                                                                                             alt=""></label>
                                <input class="galleryradio" type="radio" name="image" id="image{{$image["id"]}}"
                                       value="{{ $image["filename"] }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="formgroup">
                <label for="body">Body:</label>
                <textarea class="formcontrol" name="body" id="body">{{ $page['body'] }}</textarea>
            </div>
            <div class="formgroup" style="margintop:60px">
                <button type="submit" class="btn btnsuccess">Submit</button>
                <a class="btn btndanger" href="{{ URL::previous() }}">Decline</a>
            </div>
            <script>
                CKEDITOR.replace('body');
            </script>
        </form>
    </main>
@endsection