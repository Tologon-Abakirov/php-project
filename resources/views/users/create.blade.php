{{-- resources/views/users/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Create User</h1>

    <form action="{{ url('/users') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        <br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        
        {{-- Добавьте другие поля для пользователя, если необходимо --}}
        
        <button type="submit">Create User</button>
    </form>
@endsection
