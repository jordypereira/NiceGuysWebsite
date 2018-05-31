<form method="post" action="{{url('admin/home')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-0 mb-4">
        <label for="video">Video (embed link):</label>
        <input type="text" class="form-control" name="video" id="video" placeholder="https://www.youtube.com/embed/5IpYOF4Hi6Q" value="{{ old('video') }}">
    </div>
    <div class="form-group mt-0 mb-0">
        <button type="submit" class="btn btn-success">Bevestigen</button>
        {{--<a class="btn btn-danger" href="{{ URL::previous() }}">Annuleren</a>--}}
    </div>
    <script>
        CKEDITOR.replace('text');
    </script>
</form>