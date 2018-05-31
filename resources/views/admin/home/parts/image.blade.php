<form method="post" action="{{url('admin/home')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-0 mb-4">
        <label class="d-block" for="image">Foto</label>
        <div id="accordion3">
            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Selecteer een foto</button>
            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample6" aria-expanded="false" aria-controls="multiCollapseExample6">Upload een foto</button>
            @if(count($images) > 0)
                <div class="collapse multi-collapse" id="multiCollapseExample5" data-parent="#accordion3">
                    <div class="pt-4">
                        @foreach($images as $image)
                            <div class="gallery-wrapper">
                                <label class="gallery-label" for="image-1-{{$image["id"]}}"><img class="gallery-image img-thumbnail" src="{{ asset('images/home/'.$image["filename"]) }}" alt=""></label>
                                <div class="text-center">
                                    <input class="gallery-radio" type="radio" name="image" id="image-1-{{$image["id"]}}" value="{{ $image["filename"] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="collapse multi-collapse" id="multiCollapseExample5" style="max-height: 46px" data-parent="#accordion3">
                    <div class="alert alert-danger">
                        <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                    </div>
                </div>
            @endif
            <div class="collapse" id="multiCollapseExample6" style="max-height: 88px" data-parent="#accordion3">
                <div class="pt-4">
                    <div class="form-group">
                        <input type="file" class="form-control p-3" name="upload" id="upload">
                        <input type="hidden" value="home" id="type" name="type">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-0">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        {{--<a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>--}}
    </div>
</form>