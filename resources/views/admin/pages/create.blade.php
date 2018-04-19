@extends('layout')

@section('head')
    <script src="../ckeditor.js"/>
@endsection

@section('content')
    <h1>Voeg een custom pagina toe</h1>
    <form method="post" action="{{url('admin/pages')}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        <script>
            CKEDITOR.replace('body');
        </script>
    </form>
@endsection