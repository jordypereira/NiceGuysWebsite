<nav class="navbar navbar-expand-lg navbar-dark bg-dark ingat-regular">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-0 neg-p-15 w-100 d-block position-relative">
                <li class="nav-item d-md-block d-lg-inline-block">
                    <a class="nav-link pl-sm-0 {{(Request::is('/')) ? "active" : ""}}" href="{{ route('home') }}">Home</a>
                </li>
                @foreach($pages as $page)
                    <li class="nav-item d-md-block d-lg-inline-block">
                        <a class="nav-link {{(Request::is(str_replace(' ', '-', $page['link']))) ? "active" : ""}}" href="/{{ str_replace(' ', '-', $page['link']) }}">{{ ucfirst($page['link']) }}</a>
                    </li>
                @endforeach
                <li class="nav-item d-md-block d-lg-inline-block">
                    <a class="nav-link {{(Request::is('/game')) ? "active" : ""}}" href="{{ route('game') }}">Game</a>
                </li>
                @auth
                    <li class="nav-item dropdown d-md-inline-block float-md-none float-lg-right">
                        <a class="nav-link dropdown-toggle {{(Request::is('admin/*')) ? "active" : ""}}" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin acties
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-dark" id="dropdown" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item admin-dropdown-item" href="/admin/pages/create">Creëer een pagina</a>
                            <a class="dropdown-item admin-dropdown-item" href="/admin/pages">Bekijk alle pagina's</a>
                            <hr class="my-2">
                            <a class="dropdown-item admin-dropdown-item" href="/admin/home/create">Creëer een homeblock</a>
                            <a class="dropdown-item admin-dropdown-item" href="/admin/home">Bekijk alle homeblocks</a>
                            <hr class="my-2">
                            <a class="dropdown-item admin-dropdown-item" href="/admin/home/header/edit">Home header foto aanpassen</a>
                            <a class="dropdown-item admin-dropdown-item" href="/admin/images/create">Foto's uploaden of bekijken</a>
                            <hr class="my-2">
                            <div class="dropdown-item admin-dropdown-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="color-white">Uitloggen</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
