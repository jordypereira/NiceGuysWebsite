<form method="post" action="{{url('admin/home', $homeblock['id'] )}}" enctype="multipart/form-data" class="kids-cornerregular">
    @method('PUT')
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $homeblock['title'] }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="color">Achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="color" id="color" value="{{ $homeblock['color'] }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="font">Titel (tekst) kleur:</label>
        <div class="form-control p-2">
            <div class="d-block">
                <input class="gallery-radio" id="white2" name="font" type="radio" value="white" {{ ($homeblock['font_color'] == "white") ? 'checked' : "" }}>
                <label for="white2" class="mb-0 ml-2">Wit</label>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="black2" name="font" type="radio" value="black" {{ ($homeblock['font_color'] == "black") ? 'checked' : "" }}>
                <label for="black2" class="mb-0 ml-2">Zwart</label>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group mt-0 mb-4">
        <label for="counter_title">Tekst optelknop:</label>
        <input type="text" class="form-control" name="counter_title" id="counter_title" value="{{ $homeblock['counter_title'] }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_color">Optelknop achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="counter_color" id="counter_color" value="{{ $homeblock['counter_color'] }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_font">Optelknop (tekst) kleur:</label>
        <div class="form-control p-2">
            <div class="d-block">
                <input class="gallery-radio" id="white4" name="counter_font" type="radio" value="white" {{ ($homeblock['counter_font'] == "white") ? 'checked' : "" }}>
                <label for="white4" class="mb-0 ml-2">Wit</label>
            </div>
            <div class="d-block">
                <input class="gallery-radio" id="black5" name="counter_font" type="radio" value="black" {{ ($homeblock['counter_font'] == "black") ? 'checked' : "" }}>
                <label for="black5" class="mb-0 ml-2">Zwart</label>
            </div>
        </div>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="counter_value">Standaardwaarde:</label>
        <input type="text" class="form-control" name="counter_value" id="counter_value" value="{{ $homeblock['counter_value'] }}">
    </div>

    <div class="form-group mt-0 mb-0">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        {{--<a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>--}}
    </div>
</form>