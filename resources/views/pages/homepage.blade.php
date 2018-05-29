@extends('layout')

@section('content')
    <main>
        @if(count($blocks) > 0)
            @foreach($blocks as $block)
                <div class="modal fade" id="exampleModal{{$block['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Bent u zeker dat u dit block wilt verwijderen?</p>
                                <form action="{{ route('home.destroy', $block['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                                <h2 class="animated invisible mb-3">{{ $block['title'] }}</h2>
                                <div class="animated invisible">
                                    {!! $block['text'] !!}
                                </div>
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
                            <button type="button" class="btn btn-outline-light adminButton" data-toggle="modal" data-target="#exampleModal{{$block['id']}}" title="Delete block #{{$block['id']}}">
                                <img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon">
                            </button>
                            <a class="btn btn-outline-light adminButton" href="/admin/home/create" title="Add a homeblock">
                                <img src="{{ asset('images/add.png') }}" alt="Add icon">
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
                                <button type="button" class="btn btn-outline-light adminButton" data-toggle="modal" data-target="#exampleModal{{$block['id']}}" title="Delete block #{{$block['id']}}">
                                    <img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon">
                                </button>
                                <a class="btn btn-outline-light adminButton" href="/admin/home/create" title="Add a homeblock">
                                    <img src="{{ asset('images/add.png') }}" alt="Add icon">
                                </a>
                            </div>
                        @endauth
                    </div>
                @endif
            @endforeach
        @else
            @auth
                            <div class="m-1">
                                <a href="/admin/home/create" class="btn btn-outline-dark" title="Voeg een homeblock toe">
                                    <img src="{{ asset('images/add.png') }}" alt="Add icon">
                                </a>
                            </div>
            @endauth
        @endif
    </main>
@endsection