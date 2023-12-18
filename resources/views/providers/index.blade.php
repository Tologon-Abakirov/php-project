{{-- resources/views/providers/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>List of Providers</h1>

    <a href="{{ url('/create') }}">Add Provider</a>

    @foreach ($providers as $provider)
        <p>
            {{ $provider->name }}
            <a href="{{ url('/providers/' . $provider->id . '/edit') }}">Edit</a>
            <form action="/providers/{{ $provider->id }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </p>
        {{-- Добавьте другие поля провайдера, которые вы хотите отобразить --}}
    @endforeach
@endsection
