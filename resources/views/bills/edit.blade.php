{{-- resources/views/bills/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pricing-card">
            <div class="pricing-card__top">
                <h1 class="pricing-card__title">Edit Bill</h1>
            </div>
            <div class="pricing-card__body">
                <form action="{{ url('/bills/' . $bill->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $bill->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount', $bill->amount) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date:</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $bill->due_date) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $bill->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Provider:</label>
                        <select name="provider_id" id="provider_id" class="form-control" required>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}" {{ $bill->provider_id == $provider->id ? 'selected' : '' }}>{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $bill->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Добавьте другие поля для счета, если необходимо --}}

                    <button type="submit" class="gradient-button">Update Bill</button>
                </form>
            </div>
        </div>
    </div>
@endsection
