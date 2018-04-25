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
    <h1>
        All custom pages
        <a class="btn-link float-right" href="{{ route('pages.create') }}">
            <button class="btn btn-outline-dark">
                Create a new page
            </button>
        </a>
    </h1>
    <table class="table">
        <tbody>
        @foreach ($pages as $page)
            <tr>
                <td>
                    <span class="table-span">
                        {{ ucfirst($page['title']) }}
                        <a title="Info" data-toggle="collapse" href="#multiCollapseExample{{ $page['id'] }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{ $page['id'] }}">
                            <img src="{{ asset('images/info.png') }}" alt="Info icon">
                        </a>
                    </span>
                    <div class="float-right">
                        <a href="/{{ $page['title'] }}" target="_blank"><img src="{{ asset('images/eye.png') }}" alt="Eye icon" title="View"></a>
                        <a href="{{ route('pages.edit', $page['id']) }}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Edit"></a>
                        <form action="{{ route('pages.destroy', $page['id']) }}" method="POST" class="n-button">
                            @method('DELETE')
                            @csrf
                            <button class="delete-btn"><img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon" title="Delete"></button>
                        </form>
                    </div>
                    <div class="collapse-wrapper">
                        <div class="collapse multi-collapse" id="multiCollapseExample{{ $page['id'] }}">
                            <div class="card card-body">
                                <p>Aangemaakt op: {{ $page['created_at'] }}</p>
                                <p>Laatst aangepast op: {{ $page['updated_at'] }}</p>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection