{{-- resources/views/providers/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Add a Provider</h1>

    <form action="/providers" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        {{-- Добавьте другие поля для провайдера, если необходимо --}}
        <button type="submit">Add Provider</button>
    </form>
@endsection
