@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            <span class="kiddishmedium">
                Alle pagina's
            </span>
            <a class="btn-link float-sm-right" href="{{ route('pages.create') }}">
                <button class="btn btn-outline-dark">
                    Creëer een pagina
                </button>
            </a>
        </h1>
        @foreach ($pages as $page)
            <div class="modal fade" id="exampleModal{{ $page['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>Bent u zeker dat u deze pagina wilt verwijderen?</p>
                            <form action="{{ route('pages.destroy', $page['id']) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                                <button type="submit" class="btn btn-success">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="{{route('admin.pages.order.update')}}" method="post">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Pagina id</th>
                    <th scope="col">Pagina</th>
                    <th scope="col">Volgorde</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pages as $key => $page)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ ucfirst($page['link']) }}</td>
                        <td>
                            <input class="order-input form-control mr-0" type="number" min="1" max="{{ count($pages) }}" value="{{ $page->order }}" name="{{ $page['id'] }}">
                        </td>
                        <td>
                            <a href="/{{ str_replace(' ', '-', $page['link']) }}" target="_blank"><img src="{{ asset('images/eye.png') }}" alt="Eye icon" title="Bekijken"></a>
                            <a href="{{ route('pages.edit', $page['id']) }}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Aanpassen"></a>
                            <button type="button" class="delete-btn" data-toggle="modal" data-target="#exampleModal{{ $page['id'] }}" title="Verwijderen">
                                <img src="{{ asset('images/cancel-button.png') }}" alt="">
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit"  id="order-btn" class="invisible btn btn-success">Aanpassen</button>
            <button type="button" id="order-decline-btn" class="invisible btn btn-danger">Annuleren</button>
        </form>
    </main>

@endsection