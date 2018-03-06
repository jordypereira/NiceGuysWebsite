<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div>
    <header class="o-header">
        @include('includes.header')
    </header>
    <div class="u-wrapper">
        <main class="u-container">
            @yield('content')
        </main>

        <footer>
            @include('includes.footer')
        </footer>
    </div>
</div>
@include('includes.js')
</body>
</html>