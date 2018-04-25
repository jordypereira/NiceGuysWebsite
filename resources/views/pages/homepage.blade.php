@extends('layout')

@section('content')

    <div class="context-box-1 u-bg-black">

           <h2 class="h2 header-style">Lorem Ipsum</h2>
           <p class="paragraph-style"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

         <img src="{{ asset('images/diagram-example.png') }}" alt="diagram example" class="diagram-logo">

    </div>
    <div class="context-box-1 u-bg">
        <img src="{{ asset('images/picture.png') }}" alt="image preview" class="image-preview">
        <h2 class="h2 header-style-2">Lorem Ipsum</h2>
        <p class="paragraph-style-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

    </div>
    <div class="context-box-1 u-bg-light">
        <blockquote>
            <p>Blockquote: Arma virumque cano, Troiae qui primus ab oris Italiam, fato profugus, Laviniaque venit litora, multum ille et terris iactatus et alto vi superum saevae memorem Iunonis ob iram.</p>
            <p>Multa quoque et bello passus, dum conderet urbem, inferretque deos Latio, genus unde Latinum, Albanique patres, atque altae moenia Romae.</p>
            <cite>Publius Vergilius Maro</cite>
        </blockquote>
        <img src="{{ asset('images/left-arrow.png') }}" alt="left-arrow" class="left-arrow">
        <img src="{{ asset('images/right-arrow.png') }}" alt="right-arrow" class="right-arrow">
    </div>
@endsection