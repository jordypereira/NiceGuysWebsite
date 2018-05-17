@if(Session::has('message'))
    <div class="alert alert m-0 {{ Session::get('alert-class', 'alert-info') }}">
        <div class="container">
            <p class="m-0">{{ Session::get('message') }}</p>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="container">
            <div class="row">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif