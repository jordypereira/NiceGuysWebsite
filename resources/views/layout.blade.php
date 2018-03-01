<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <main class="row">

        @yield('content')

    </main>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>