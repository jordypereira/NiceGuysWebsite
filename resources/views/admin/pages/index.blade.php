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
    <p><a href="{{ route('pages.create') }}">Create a new page</a></p>
    @foreach ($pages as $page)
        <table class="table">
            <tbody>
            <tr>
                <td>{{ $page['title'] }}</td>
                <td>
                    <a href="/{{ $page['title'] }}" target="_blank"><img src="{{ asset('images/eye.png') }}" alt="Eye icon" title="View"></a>
                    <a href="{{ route('pages.edit', $page['id']) }}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Edit"></a>
                    <form action="{{ route('pages.destroy', $page['id']) }}" method="POST" class="n-button">
                        @method('DELETE')
                        @csrf
                        <button class="delete-btn"><img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon" title="Delete"></button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endsection