<form method="post" action="{{url('admin/home')}}" enctype="multipart/form-data" class="kids-cornerregular">
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="color">Achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="color" id="color" value="{{ (old('color')) ? old('color') : "#d0003a" }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="font">Titel (tekst) kleur:</label>
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
    <hr>
    <div class="form-group mt-0 mb-4">
        <label for="counter_title">Tekst optelknop:</label>
        <input type="text" class="form-control" name="counter_title" id="counter_title" value="{{ old('counter_title') }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_color">Optelknop achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="counter_color" id="counter_color" value="{{ (old('counter_color')) ? old('counter_color') : "#d0003a" }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_font">Optelknop (tekst) kleur:</label>
        <div class="form-control p-2">
            <div class="d-block">
                <input class="gallery-radio" id="white4" name="counter_font" type="radio" value="white">
                <label for="white4" class="mb-0 ml-2">Wit</label>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="black5" name="counter_font" type="radio" value="black" checked>
                <label for="black5" class="mb-0 ml-2">Zwart</label>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_value">Standaardwaarde:</label>
        <input type="text" class="form-control" name="counter_value" id="counter_value" value="{{ (old('counter_value')) ? old('counter_value') : "0" }}">
    </div>

    <div class="form-group mt-0 mb-0">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        {{--<a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>--}}
    </div>
</form>