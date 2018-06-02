@extends('layout')

@section('content')
    <main class="container py-5">
        <h1 class="mt-0 mb-4">Home header foto aanpassen</h1>
        <div class="form-text text-muted mb-4">Deze foto wordt ook gebruikt als header foto voor alle admin acties</div>
        <form method="post" action="{{url('admin/home/header/update')}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mt-0 mb-4">
                <div class="collapse show multi-collapse">
                    <label><a href="{{ asset('images/header/'.$header->image) }}" target="_blank">Foto:</a></label>
                </div>
                <div id="accordion">
                    <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</button>
                    <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Upload een foto</button>
                    @if(count($images) > 0)
                        <div class="collapse multi-collapse" id="multiCollapseExample1" data-parent="#accordion">
                            <div class="pt-4">
                                @foreach($images as $image)
                                    <div class="gallery-wrapper">
                                        <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image img-thumbnail" src="{{ asset('images/header/'.$image["filename"]) }}" alt=""></label>
                                        <div class="text-center">
                                            <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}" {{ $header ? (($image["filename"] == $header->image) ? 'checked' : "") : '' }}>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="collapse multi-collapse" id="multiCollapseExample1" data-parent="#accordion">
                            <div class="pt-4">
                                <div class="m-0 alert alert-danger">
                                    <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="collapse" id="multiCollapseExample2" style="max-height: 88px" data-parent="#accordion">
                        <div class="pt-4">
                            <div class="form-group">
                                <input type="file" class="form-control p-3" name="upload" id="upload">
                                <input type="hidden" value="header" id="type" name="type">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-0 mb-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Bevestigen</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
            </div>
        </form>
    </main>
@endsection