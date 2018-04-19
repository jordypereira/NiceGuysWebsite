@extends('layout')

@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
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
        <li>{{ $page['title'] }}
            <a href="{{ route('pages.edit', $page['id']) }}" type="button" class="btn btn-secondary">Edit</a>
            <form action="{{ route('pages.destroy', $page['id']) }}" method="POST">
                @method('DELETE')
                @csrf
                <button>Delete Page</button>
            </form>
        </li>
    @endforeach
@endsection