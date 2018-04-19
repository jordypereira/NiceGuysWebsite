@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>All custom pages</h1>
    @foreach ($pages as $page)
        <li>{{ $page['title'] }} <a href="{{ route('pages.edit', $page['id']) }}" type="button" class="btn btn-secondary">Edit</a></li>
    @endforeach
@endsection