{{-- resources/views/bills/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Bill Information</h1>

    <p>Name: {{ $bill->name }}</p>

    {{-- Добавьте другие поля счета, которые вы хотите отобразить --}}
@endsection
