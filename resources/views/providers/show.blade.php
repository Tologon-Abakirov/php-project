{{-- resources/views/providers/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>{{ $provider->name }}</h1>

    <p>Email: {{ $provider->email }}</p>
    <p>Phone: {{ $provider->phone }}</p>
    {{-- Добавьте другие поля провайдера, которые вы хотите отобразить --}}

    <a href="{{ url('/providers') }}">Back to Providers</a>
@endsection
