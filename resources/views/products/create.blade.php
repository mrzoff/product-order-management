<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Добавление товара</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="description">Описание:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <label for="price">Цена (руб.):</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="category_id">Категория:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">Сохранить</button>
</form>
@endsection