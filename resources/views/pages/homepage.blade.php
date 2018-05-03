@extends('layout')

@section('content')
    @if(!empty($blocks))
    @foreach($blocks as $key => $block)
    @if($key % 2 === 0)
        <div class="home-block u-bg-black py-5">
    @else
        <div class="home-block u-bg py-5">
    @endif
        @if($key % 2 === 0)
            <div class="context-inner row">
        @else
            <div class="context-inner row flex-row-reverse">
                @endif
                <div class="col-xs-12 col-md-8">
                    <h2 class="h2 mb-5">{{ $block['title'] }}</h2>
                    {!! $block['text'] !!}
                </div>
                <div class="col-xs-12 col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('images/homeblock/'.$block['image']) }}" alt="Block Image" class="home-img p-3">
                </div>
            </div>
        </div>
    @endforeach
    @endif
    <div class="context-box-1 u-bg-light">
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