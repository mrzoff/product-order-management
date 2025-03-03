<!-- resources/views/orders/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Добавление заказа</h1>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div>
        <label for="customer_name">ФИО покупателя:</label>
        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required>
        @error('customer_name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="product_id">Товар:</label>
        <select name="product_id" id="product_id" required>
            @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                {{ $product->name }} ({{ $product->price }} руб.)
            </option>
            @endforeach
        </select>
        @error('product_id')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="1" required>
        @error('quantity')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="comment">Комментарий:</label>
        <textarea name="comment" id="comment">{{ old('comment') }}</textarea>
    </div>
    <button type="submit">Создать заказ</button>
</form>
@endsection