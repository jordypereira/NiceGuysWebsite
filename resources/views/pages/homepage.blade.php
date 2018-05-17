@extends('layout')

@section('content')
    <main>
        @if(!empty($blocks))
            @foreach($blocks as $key => $block)
                @isset($block['title'])
                <div class="home-block position-relative {{($key % 2 === 0) ? "u-bg" : "u-bg-light"}}">
                    <div class="container py-5">
                        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
                            @if(!empty($block['image']))
                            <div class="col-xs-12 col-md-12 col-lg-6">
                            @else
                            <div class="col-xs-12 col-md-12 col-lg-12">
                            @endif
                                    <h2 class="h2 mb-3">{{ $block['title'] }}</h2>
                                <p>{!! $block['text'] !!}</p>
                            </div>
                            @if(!empty($block['image']))
                            <div class="col-xs-12 col-md-12 col-lg-6 d-flex flex-center mt-sm-4 mt-md-0 mt-lg-0">
                                <img src="{{ asset('images/home/'.$block['image']) }}" alt="Block Image" class="home-img border invisible animated">
                            </div>
                            @endif
                        </div>
                    </div>
                    @auth
                        <div class="position-absolute admin-actions m-1">
                            <a class="btn btn-outline-light adminButton" href="/admin/home/{{$block['id']}}/edit?f=b" title="Edit block #{{$block['id']}}">
                                <img src="{{ asset('images/pencil.png') }}" alt="Edit icon">
                            </a>
                            <form action="{{ route('home.destroy', $block['id']) }}" method="POST" class="d-inline-block adminButton">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-light"
                                        onclick="return confirm('Ben je zeker dat je deze Home Block wilt verwijderen?')"
                                        title="Delete block #{{$block['id']}}">
                                    <img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon">
                                </button>
                            </form>
                            <a class="btn btn-outline-light adminButton" href="/admin/home/create" title="Add a home block">
                                <img src="{{ asset('images/add.png') }}" alt="Delete icon">
                            </a>
                        </div>
                    @endauth
                </div>
                @endisset
                @if($block['video'])
                    <div class="video-wrapper bg-dark py-5 position-relative">
                        <div class="container">
                            <iframe
                                    {{--width="1280"--}}
                                    height="600"
                                    class="w-100"
                                    src="{{$block['video']}}"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>
                        @auth
                            <div class="position-absolute admin-actions m-1">
                                <a class="btn btn-outline-light adminButton" href="/admin/home/{{$block['id']}}/edit?f=v" title="Edit block #{{$block['id']}}">
                                    <img src="{{ asset('images/pencil.png') }}" alt="Edit icon">
                                </a>
                                <form action="{{ route('home.destroy', $block['id']) }}" method="POST" class="d-inline-block adminButton">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-light"
                                            onclick="return confirm('Ben je zeker dat je deze Home Block wilt verwijderen?')"
                                            title="Delete block #{{$block['id']}}">
                                        <img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon">
                                    </button>
                                </form>
                                <a class="btn btn-outline-light adminButton" href="/admin/home/create" title="Add a home block">
                                    <img src="{{ asset('images/add.png') }}" alt="Delete icon">
                                </a>
                            </div>
                        @endauth
                    </div>
                @endif
            @endforeach
        @endif
    </main>
@endsection