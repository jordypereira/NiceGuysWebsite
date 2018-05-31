<div class="position-absolute admin-actions m-1">
    <button class="btn btn-dark adminButton" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('images/edit.png') }}" alt="">
    </button>
    <div class="dropdown-menu bg-dark adminButton" aria-labelledby="navbarDropdown">
        <a class="dropdown-item admin-dropdown-item" href="/admin/home/{{$block['id']}}/edit?type={{$block['type']}}" title="Block #{{$block['id']}} aanpassen">
            Block aanpassen
        </a>
        <span class="dropdown-item admin-dropdown-item" data-toggle="modal" data-target="#exampleModal{{$block['id']}}" title="Verwijder block #{{$block['id']}}">
                                    Verwijder block
                                </span>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item admin-dropdown-item" href="/admin/home/create" title="Maak een nieuw homeblock">Nieuw homeblock</a>
    </div>
</div>