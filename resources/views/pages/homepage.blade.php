@extends('layout')

@section('content')
    <main>
        @if(!empty($blocks))
            @foreach($blocks as $key => $block)
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
                                <img src="{{ asset('images/homeblock/'.$block['image']) }}" alt="Block Image" class="home-img border invisible animated">
                            </div>
                            @endif
                        </div>
                    </div>
                    @auth
                        <div class="position-absolute admin-actions m-1">
                            <a class="btn btn-outline-dark adminButton" href="/admin/home/{{$block['id']}}/edit" title="Edit block #{{$block['id']}}">bewerken</a>
                            <form action="{{ route('home.destroy', $block['id']) }}" method="POST" class="d-inline-block adminButton">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger"
                                        onclick="return confirm('Ben je zeker dat je deze Home Block wilt verwijderen?')"
                                        title="Delete block #{{$block['id']}}">
                                    verwijderen
                                </button>
                            </form>
                            <a class="btn btn-outline-dark adminButton" href="/admin/home/create" title="Add a home block">toevoegen</a>
                        </div>
                    @endauth
                </div>
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
                                <a class="btn btn-outline-light adminButton" href="/admin/home/{{$block['id']}}/edit" title="Edit block #{{$block['id']}}">bewerken</a>
                            </div>
                        @endauth
                    </div>
                @endif
            @endforeach
        @endif
    </main>
@endsection