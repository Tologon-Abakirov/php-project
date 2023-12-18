{{-- resources/views/bills/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="pricing">
        <div class="container">
            <h1 class="pricing__title">List of Bills</h1>
            <a href="{{ url('bills/create') }}" class="btn gradient-button">Создать счет</a>

            <ul class="pricing__grid">
                @foreach ($bills as $bill)
                    <li class="pricing-card pricing-card_{{ strtolower($bill->user ? $bill->user->name : 'no-user') }}">
                        <div class="pricing-card__top">
                            <span class="pricing-card__title">{{ $bill->user->name }}</span>
                            <span class="pricing-card__price">{{ $bill->provider->name }}</span>
                            <span>{{ $bill->amount }} - {{ $bill->due_date }}</span>
                        </div>
                        <div class="pricing-card__body">
                            {{-- Добавьте другие поля, которые вы хотите отобразить --}}
                            <a href="{{ url('/bills/' . $bill->id . '/edit') }}" class="btn gradient-button">Edit</a>
                            <form action="/bills/{{ $bill->id }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this bill?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn gradient-button">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
