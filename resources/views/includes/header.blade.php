<img src="{{ asset('images/A-Logo.jpg') }}" alt="Official logo Antwerpen" class="a-logo
            @auth
                {{ (Request::is('/')) ? "a-logo-util" : "" }}
            @endauth
        ">
@auth
    @if (Request::is('/'))
        <div class="position-absolute admin-actions mt-1  ml-3 ml-md-1">
            <button class="btn btn-dark adminButton" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('images/edit.png') }}" alt="">
            </button>
            <div class="dropdown-menu bg-dark adminButton" aria-labelledby="navbarDropdown">
                <a class="dropdown-item admin-dropdown-item" href="admin/home/header/edit" title="Homepage foto aanpassen">
                    Foto aanpassen
                </a>
            </div>
        </div>
    @endif
@endauth