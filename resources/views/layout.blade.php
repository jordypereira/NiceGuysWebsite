<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div>
    <header>
        @include('includes.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('includes.footer')
    </footer>
</div>
@include('includes.js')
</body>
</html>