@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            Alle pagina's
            <a class="btn-link float-right" href="{{ route('pages.create') }}">
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
                                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <table class="table m-0">
            <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td class="pt-0 pb-4">
                    <span class="table-span">
                        {{ ucfirst($page['title']) }}
                    </span>
                        <div class="float-right">
                            <a href="/{{ str_replace(' ', '-', $page['link']) }}" target="_blank"><img src="{{ asset('images/eye.png') }}" alt="Eye icon" title="Bekijken"></a>
                            <a href="{{ route('pages.edit', $page['id']) }}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Aanpassen"></a>
                            <button type="button" class="delete-btn" data-toggle="modal" data-target="#exampleModal{{ $page['id'] }}" title="Verwijderen">
                                <img src="{{ asset('images/cancel-button.png') }}" alt="">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>

@endsection