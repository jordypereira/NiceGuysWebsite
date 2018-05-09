@extends('layout')

@section('content')
    <main class="container py-5">
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
        <h1 class="mt-0 mb-4">
            All Home Blocks
            <a class="btn-link float-right" href="{{ route('home.create') }}">
                <button class="btn btn-outline-dark">
                    Create a new Block
                </button>
            </a>
        </h1>
        <table class="table m-0">
            <tbody>
            @foreach ($blocks as $block)
                <tr>
                    <td class="pt-0 pb-4">
                    <span class="table-span">
                        {{ ucfirst($block['title']) }}
                    </span>
                        <div class="float-right">
                            <a href="{{ route('home.edit', $block['id']) }}" class="n-button"><img src="{{ asset('images/pencil.png') }}" alt="Edit icon" title="Edit"></a>
                            <form action="{{ route('home.destroy', $block['id']) }}" method="POST" class="n-button">
                                @method('DELETE')
                                @csrf
                                <button class="delete-btn" onclick="return confirm('Ben je zeker dat je deze Home Block wilt verwijderen?')"><img src="{{ asset('images/cancel-button.png') }}" alt="Delete icon" title="Delete"></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>

@endsection