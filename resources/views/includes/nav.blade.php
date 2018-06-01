<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-0 neg-p-15 w-100 d-block">
                <li class="nav-item d-md-block d-lg-inline-block">
                    <a class="nav-link pl-sm-0 {{(Request::is('/')) ? "active" : ""}}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                @foreach($pages as $page)
                    <li class="nav-item d-md-block d-lg-inline-block">
                        <a class="nav-link {{(Request::is(str_replace(' ', '-', $page['link']))) ? "active" : ""}}" href="/{{ str_replace(' ', '-', $page['link']) }}">{{ ucfirst($page['link']) }}</a>
                    </li>
                @endforeach
                @auth
                    <li class="nav-item dropdown d-md-inline-block float-md-none float-lg-right">
                        <a class="nav-link dropdown-toggle {{(Request::is('admin/*')) ? "active" : ""}}" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin acties
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin/pages/create">Creëer een pagina</a>
                            <a class="dropdown-item" href="/admin/pages">Bekijk alle pagina's</a>
                            <hr class="my-2">
                            <a class="dropdown-item" href="/admin/home/create">Creëer een homeblock</a>
                            <a class="dropdown-item" href="/admin/home">Bekijk alle homeblocks</a>
                            <hr class="my-2">
                            <a class="dropdown-item" href="/admin/images/create">Upload een foto</a>
                            <hr class="my-2">
                            <div class="dropdown-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
