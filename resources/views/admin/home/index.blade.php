@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">
            Alle home blocks
            <div class="float-right">
                <button class="btn btn-outline-dark" id="order-btn">Volgorde aanpassen</button>
                <a class="btn-link" href="{{ route('home.create') }}">
                    <button class="btn btn-outline-dark">
                        Creëer een home block
                    </button>
                </a>
            </div>
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
            <table class="table m-0">
                <tbody>
                @foreach($blocks as $block)
                <tr>
                    <td class="pt-0 pb-4">
                            <span class="table-span">
                                @if ($block['title'])
                                    {{ ucfirst($block['title']) }}
                                @elseif(!$block['title'] && $block['video'])
                                    {{ $block['video'] }}
                                @else
                                    {{ $block['image'] }}
                                @endif
                                {{ !isset($block['title']) ? ucfirst($block['title']) : "" }}
                            </span>
                    </td>
                    <td class="invisible order">
                        <input class="order-input form-control" type="number" min="1" value="{{ $block['order_id'] }}" name="{{ $block['id'] }}">
                    </td>
                    <td>
                        <div class="float-right">
                            <a href="/admin/home/{{$block['id']}}/edit?type={{$block['type']}}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Edit"></a>
                            <button type="button" class="delete-btn" data-toggle="modal" data-target="#exampleModal{{$block['id']}}">
                                <img src="{{ asset('images/cancel-button.png') }}">
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="invisible order btn btn-success">Aanpassen</button>
        </form>
    </main>

@endsection