<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('head')
</head>
<body>
<div>
    @if (isset($page['image']))
    <div class="header" style="background-image: url('{{ asset('images/header/'.$page['image']) }}')">
    @else
    <div class="header">
    @endif
        @include('includes.header')
    </div>
    @include('includes.nav')
    @yield('content')
    <footer>
        @include('includes.footer')
    </footer>
</div>
@include('includes.js')
</body>
</html>