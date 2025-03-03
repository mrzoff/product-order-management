<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Редактирование товара</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="description">Описание:</label>
        <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
    </div>
    <div>
        <label for="price">Цена (руб.):</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="category_id">Категория:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">Обновить</button>
</form>
@endsection