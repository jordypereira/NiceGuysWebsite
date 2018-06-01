@extends('layout')

@section('content')
    <main class="position-relative d-block">
        @if(count($blocks) > 0)
            @foreach($blocks as $block)
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



            @foreach($blocks as $key => $block)
                @switch($block['type'])

                    @case(1)
                        @include('pages/parts/title-text-image')
                    @break

                    @case(2)
                        @include('pages/parts/title-text')
                    @break

                    @case(3)
                        @include('pages/parts/title-image')
                    @break

                    @case(4)
                        @include('pages/parts/image')
                    @break

                    @case(5)
                        @include('pages/parts/video')
                    @break

                    @case(6)
                        @include('pages/parts/counter')
                    @break

                @endswitch
            @endforeach
        @else
            @auth
                <div class="position-absolute admin-actions m-1">
                    <a class="btn btn-dark adminButton" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/edit.png') }}" alt="">
                    </a>
                    <div class="dropdown-menu bg-dark adminButton" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item admin-dropdown-item" href="/admin/home/create" title="Maak een nieuw homeblock">Nieuw homeblock</a>
                    </div>
                </div>
            @endauth
        @endif
    </main>
@endsection