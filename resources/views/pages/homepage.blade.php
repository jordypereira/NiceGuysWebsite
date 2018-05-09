@extends('layout')

@section('content')
    @if(!empty($blocks))
        @foreach($blocks as $key => $block)
            <div class="home-block position-relative {{($key % 2 === 0) ? "u-bg" : "u-bg-light"}}">
                <div class="container py-5">
                    <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <h2 class="h2 mb-3">{{ $block['title'] }}</h2>
                            <p>{!! $block['text'] !!}</p>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6 d-flex flex-center mt-sm-4 mt-md-0 mt-lg-0">
                            <img src="{{ asset('images/homeblock/'.$block['image']) }}" alt="Block Image" class="home-img border">
                        </div>
                    </div>
                </div>
                @auth
                    <div class="position-absolute admin-actions m-1">
                        <a class="btn btn-dark" href="/admin/home/{{$block['id']}}/edit">edit</a>
                    </div>
                @endauth
            </div>
        @endforeach
    @endif
    <div class="context-box-1 u-bg-white">
        <blockquote>
            <p>Blockquote: Arma virumque cano, Troiae qui primus ab oris Italiam, fato profugus, Laviniaque venit
                litora, multum ille et terris iactatus et alto vi superum saevae memorem Iunonis ob iram.</p>
            <p>Multa quoque et bello passus, dum conderet urbem, inferretque deos Latio, genus unde Latinum, Albanique
                patres, atque altae moenia Romae.</p>
            <cite>Publius Vergilius Maro</cite>
        </blockquote>
        <img src="{{ asset('images/left-arrow.png') }}" alt="left-arrow" class="left-arrow">
        <img src="{{ asset('images/right-arrow.png') }}" alt="right-arrow" class="right-arrow">
    </div>
@endsection