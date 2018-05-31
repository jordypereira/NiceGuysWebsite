@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            Alle home blocks
            <a class="btn-link float-sm-right" href="{{ route('home.create') }}">
                <button class="btn btn-outline-dark">
                    Creëer een home block
                </button>
            </a>
        </h1>
        @foreach ($blocks as $block)
            <div class="modal fade" id="exampleModal{{$block['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>Bent u zeker dat u dit block wilt verwijderen?</p>
                            <form action="{{ route('home.destroy', $block['id']) }}" method="POST">
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
        <form method="post" action="{{route('admin.order.update')}}">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titel</th>
                    <th scope="col">Volgorde</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($blocks as $key => $block)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                @if ($block['title'])
                                    {{ ucfirst($block['title']) }}
                                @elseif(!$block['title'] && $block['video'])
                                    {{ $block['video'] }}
                                @else
                                    {{ $block['image'] }}
                                @endif
                            </td>
                            <td>
                                <input class="order-input form-control mr-0" type="number" min="1" value="{{ $block['order_id'] }}" name="{{ $block['id'] }}">
                            </td>
                            <td>
                                <a href="/admin/home/{{$block['id']}}/edit?type={{$block['type']}}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Aanpassen"></a>
                                <button type="button" class="delete-btn" data-toggle="modal" data-target="#exampleModal{{$block['id']}}" title="Verwijderen">
                                    <img src="{{ asset('images/cancel-button.png') }}">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="invisible order btn btn-success">Aanpassen</button>
        </form>
    </main>

@endsection