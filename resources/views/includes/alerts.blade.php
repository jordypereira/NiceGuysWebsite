@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }} m-0">{{ Session::get('message') }}</p>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif