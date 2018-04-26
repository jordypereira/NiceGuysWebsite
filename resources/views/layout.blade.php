<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('head')
</head>
<body>
<div>
    <div class="header">
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