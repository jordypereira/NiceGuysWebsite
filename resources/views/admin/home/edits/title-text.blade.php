<form method="post" action="{{url('admin/home', $homeblock['id'] )}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $homeblock->title }}" {{($focus === "b") ? "autofocus" : ""}}>
    </div>
    <div class="form-group mt-0 mb-4">
        <label for="text">Body:</label>
        <textarea class="form-control" name="text" id="text">{{ $homeblock['text'] }}</textarea>
    </div>
    <div class="form-group mt-0 mb-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        <a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>
    </div>
    <script>
        CKEDITOR.replace('text');
    </script>
</form>