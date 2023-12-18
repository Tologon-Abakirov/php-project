{{-- resources/views/providers/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Edit Provider</h1>

    <form action="/providers/{{ $provider->id }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $provider->name }}" required>
        {{-- Добавьте другие поля для провайдера, если необходимо --}}
        <button type="submit">Update Provider</button>
    </form>
@endsection
