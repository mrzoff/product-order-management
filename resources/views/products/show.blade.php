<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Информация о товаре</h1>

<div>
    <p><strong>Название:</strong> {{ $product->name }}</p>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
</div>

<a href="{{ route('products.index') }}">Назад к списку товаров</a>
@endsection