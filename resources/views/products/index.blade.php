<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Список товаров</h1>
<a href="{{ route('products.create') }}">Добавить товар</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }} руб.</td>
            <td>{{ $product->category->name }}</td>
            <td>
                <a href="{{ route('products.show', $product) }}">Просмотр</a>
                <a href="{{ route('products.edit', $product) }}">Редактировать</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection