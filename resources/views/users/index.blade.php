{{-- resources/views/users/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>List of Users</h1>

    <a href="{{ url('users/create') }}">Create User</a>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                {{-- Добавьте другие поля, которые вы хотите отобразить --}}

                  <a href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>
                    <form action="/users/{{ $user->id }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this bill?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>

            </form>
            </li>
        @endforeach
    </ul>
@endsection
