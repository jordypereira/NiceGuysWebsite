<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('head')
</head>
<body>
    <a href="{{ route('home') }}">
        @if (!empty($headerImage))
            <div class="header" style="background-image: url('{{ asset('images/'.$headerImage) }}')">
        @else
            <div class="header" style="background-image: url('{{ asset('images/headerbw.jpg') }}')">
        @endif
            @include('includes.header')
        </div>
    </a>
    @include('includes.nav')
    @include('includes.alerts')
    @yield('content')
    <footer>
        @include('includes.footer')
    </footer>
@include('includes.js')
</body>
</html>