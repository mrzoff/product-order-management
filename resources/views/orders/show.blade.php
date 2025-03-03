<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Информация о заказе</h1>

<div>
    <p><strong>ФИО покупателя:</strong> {{ $order->customer_name }}</p>
    <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y') }}</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }} ({{ $order->product->price }} руб.)</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Итоговая цена:</strong> {{ $order->total_price }} руб.</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
</div>

<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" name="status" value="completed">Выполнить заказ</button>
</form>

<a href="{{ route('orders.index') }}">Назад к списку заказов</a>
@endsection