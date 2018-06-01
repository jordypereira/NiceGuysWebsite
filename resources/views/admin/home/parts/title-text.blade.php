<form method="post" action="{{url('admin/home')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="text">Tekst:</label>
        <textarea type="text" class="form-control" name="text" id="text2">{{ old('text') }}</textarea>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="color">Achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="color" id="color" value="#d0003a">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="font">Tekst kleur:</label>
        <div class="form-control p-2">
            <div class="d-block">
                <input class="gallery-radio" id="white2" name="font" type="radio" value="white">
                <label for="white2" class="mb-0 ml-2">Wit</label>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="black2" name="font" type="radio" value="black" checked>
                <label for="black2" class="mb-0 ml-2">Zwart</label>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-0">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        {{--<a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>--}}
    </div>
    <script>
        CKEDITOR.replace('text2');
    </script>
</form>