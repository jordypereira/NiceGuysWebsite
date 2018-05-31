<form method="post" action="{{url('admin/home', $homeblock['id'] )}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="video">Video (embed link):</label>
        <input type="text" class="form-control" name="video" id="video"  value="{{ $homeblock->video }}" {{($focus === "v") ? "autofocus" : ""}}>
    </div>
    <div class="form-group mt-0 mb-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
    </div>
</form>