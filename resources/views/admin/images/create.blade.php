@extends('layout')

@section('head')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Foto uploaden</h1>
        <form method="post" action="{{url('admin/images')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-0 mb-4">
                <input type="file" class="form-control p-3" name="image" id="image">
                <div class="form-text text-muted">Max upload size: 2048 kB</div>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="home" name="type" type="radio" value="home">
                <label for="home">Homepage foto</label>
            </div>
            <div class="d-block mb-4">
                <input class="gallery-radio" id="header" name="type" type="radio" value="header">
                <label for="header">Header foto</label>
            </div>
            <div class="form-group mt-0 mb-4">
                <button type="submit" class="btn btn-success">Uploaden</button>
            </div>
        </form>
        @foreach($headerImages as $image)
            <div class="modal fade" id="exampleModal{{$image['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>Bent u zeker dat u foto {{$image['id']}} wilt verwijderen?</p>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                            <form action="{{ route('images.destroy', $image['id']) }}" method="POST" class="d-inline-block adminButton">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"
                                        title="Delete foto #{{$image['id']}}">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($homeImages as $image)
            <div class="modal fade" id="exampleModal{{$image['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>Bent u zeker dat u foto {{$image['id']}} wilt verwijderen?</p>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                            <form action="{{ route('images.destroy', $image['id']) }}" method="POST" class="d-inline-block adminButton">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"
                                        title="Delete foto #{{$image['id']}}">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(count($headerImages) or count($homeImages))
            <h2 class="mb-4">Uploaded images</h2>
            <div class="row">
                <div class="col-12 pb-4">
                    <h5 class="m-0 pb-4">Header foto's</h5>
                    @if(count($headerImages))
                        @foreach($headerImages as $image)
                            <div class="gallery-wrapper position-relative">
                                <button type="button" class="position-absolute delete-image-btn btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$image['id']}}">
                                    X
                                </button>
                                <a href="{{ asset('images/header/'.$image["filename"]) }}"><img class="gallery-image img-thumbnail" src="{{ asset('images/header/'.$image["filename"]) }}" alt="" title="{{$image["filename"]}}"></a>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">
                            <p class="m-0">Geen foto's gevonden.</p>
                        </div>
                    @endif
                </div>
                <div class="col-12 pb-4">
                    <h5 class="m-0 pb-4">Home pagina foto's</h5>
                    @if(count($homeImages))
                        @foreach($homeImages as $image)
                            <div class="gallery-wrapper position-relative">
                                <button type="button" class="position-absolute delete-image-btn btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$image['id']}}">
                                    X
                                </button>
                                <a href="{{ url('admin/images/'.$image["id"]) }}"><img class="gallery-image img-thumbnail" src="{{ asset('images/home/'.$image["filename"]) }}" alt="" title="{{$image["filename"]}}"></a>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">
                            <p class="m-0">Geen foto's gevonden.</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </main>
@endsection