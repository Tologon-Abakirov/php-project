<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ url('/users/' . $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>

        <!-- Добавьте другие поля пользователя, если необходимо -->

        <button type="submit">Update User</button>
    </form>
@endsection
