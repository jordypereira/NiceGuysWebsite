@extends('layout')

@section('content')
    <h1>Voeg een custom pagina toe</h1>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title">
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
        <button>Add Page</button>
    </form>
@endsection