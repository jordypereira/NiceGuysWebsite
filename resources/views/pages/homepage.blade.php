@extends('layout')

@section('content')
    <div class="u-bg-black py-5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h2 class="h2 mb-5">Wist u dat..</h2>
                    <ul>
                        <li> Ruim een op drie (31,3%) werd al eens uitgescholden
                            voor slet, hoer, janet… op (weg naar/van) school of in
                            zijn/haar vrije tijd. </li>
                        <li>Bijna een op drie (28,9%) kreeg al eens seksueel
                            getinte opmerkingen over borsten, billen,
                            geslachtsdelen op (weg naar/van) school of in
                            zijn/haar vrije tijd.</li>
                        <li>Ruim een op drie (31,3%) werd al eens uitgescholden
                            voor slet, hoer, janet… op (weg naar/van) school of in
                            zijn/haar vrije tijd.</li>
                        <li>Bijna een op drie (28,9%) kreeg al eens seksueel
                            getinte opmerkingen over borsten, billen,
                            geslachtsdelen op (weg naar/van) school of in
                            zijn/haar vrije tijd.</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-4 d-flex justify-content-center pt-5">
                    <img src="{{ asset('images/diagram-example.png') }}" alt="diagram example" class="img-fluid p-3">
                </div>
            </div>
        </div>
    </div>
    <div class="u-bg py-5">
        <div class="context-inner row">
            <div class="col-xs-12 col-md-4 d-flex justify-content-center pt-5">
                <img src="{{ asset('images/picture.png') }}" alt="image preview" class="image-fluid">
            </div>
            <div class="col-xs-12 col-md-8">
                <h2 class="h2 mb-5">Lorem Ipsum</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
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