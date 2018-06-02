<form method="post" action="{{url('admin/home', $homeblock['id'] )}}" enctype="multipart/form-data" class="kids-cornerregular">
    @method('PUT')
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="video">Video (embed link):</label>
        <input type="text" class="form-control" name="video" id="video"  value="{{ $homeblock->video }}">
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="color">Achtergrond kleur:</label>
        <input type="color" class="form-control color-input" name="color" id="color" value="{{ $homeblock->color }}">
    </div>
    <div class="form-group mt-0 mb-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
    </div>
</form>