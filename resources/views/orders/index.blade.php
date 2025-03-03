<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Список заказов</h1>
<a href="{{ route('orders.create') }}">Добавить заказ</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Дата создания</th>
            <th>ФИО покупателя</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at->format('d.m.Y') }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->total_price }} руб.</td>
            <td>
                <a href="{{ route('orders.show', $order) }}">Просмотр</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection