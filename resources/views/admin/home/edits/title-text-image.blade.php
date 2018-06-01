<form method="post" action="{{url('admin/home', $homeblock['id'] )}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $homeblock->title }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <div class="collapse show multi-collapse">
            <label><a href="{{ asset('images/home/'.$homeblock->image) }}" target="_blank">Foto:</a></label>
        </div>
        <div id="accordion">
            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Selecteer een foto</button>
            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" href="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Upload een foto</button>
            @if(count($images) > 0)
                <div class="collapse multi-collapse" id="multiCollapseExample1" data-parent="#accordion">
                    <div class="pt-4">
                        @foreach($images as $image)
                            <div class="gallery-wrapper">
                                <label class="gallery-label" for="image-{{$image["id"]}}"><img class="gallery-image img-thumbnail" src="{{ asset('images/home/'.$image["filename"]) }}" alt=""></label>
                                <div class="text-center">
                                    <input class="gallery-radio" type="radio" name="image" id="image-{{$image["id"]}}" value="{{ $image["filename"] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="collapse multi-collapse" id="multiCollapseExample1" style="max-height: 46px" data-parent="#accordion">
                    <div class="alert alert-danger">
                        <p class="m-0">U moet eerst een foto uploaden voor u er een kunt selecteren!</p>
                    </div>
                </div>
            @endif
            <div class="collapse" id="multiCollapseExample2" style="max-height: 88px" data-parent="#accordion">
                <div class="pt-4">
                    <div class="form-group">
                        <input type="file" class="form-control p-3" name="upload" id="upload">
                        <input type="hidden" value="home" id="type" name="type">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="text">Body:</label>
        <textarea class="form-control" name="text" id="text">{{ $homeblock['text'] }}</textarea>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="color">Achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="color" id="color" value="{{ $homeblock->color }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="font">Tekst kleur:</label>
        <div class="form-control p-2">
            <div class="d-block">
                <input class="gallery-radio" id="white" name="font" type="radio" value="white" {{ ($homeblock->font_color == "white") ? "checked" : "" }}>
                <label for="white" class="mb-0 ml-2">Wit</label>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="black" name="font" type="radio" value="black" {{ ($homeblock->font_color == "black") ? "checked" : "" }}>
                <label for="black" class="mb-0 ml-2">Zwart</label>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
    </div>
    <script>
        CKEDITOR.replace('text');
    </script>
</form>