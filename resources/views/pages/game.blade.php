@extends('layout')

@section('head')
    <link rel="stylesheet" href={{ asset('game_files/TemplateData/style.css') }}>
    <script src={{ asset('game_files/TemplateData/UnityProgress.js') }}></script>
    <script src={{ asset('game_files/Build/UnityLoader.js')}}></script>
    <script>
        var gameInstance = UnityLoader.instantiate("gameContainer", 'game_files/Build/Build.json', {onProgress: UnityProgress});
    </script>
@endsection

@section('content')
    <main>
        <div class="container">
            <h1>De game: Op weg naar school</h1>
            <p>Speelbaar met pijltjes toetsen en muis.</p>
            <div class="position-relative m-auto" style="width: 960px; height: 700px">
                <div class="webgl-content">
                    <div id="gameContainer" style="width: 960px; height: 600px"></div>
                    <div class="footer">
                        <div class="webgl-logo"></div>
                        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
                        <div class="title">Sexual Assault Game</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection