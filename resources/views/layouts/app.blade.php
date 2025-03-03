<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление продуктами и заказами</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('products.index') }}">Товары</a>
            <a href="{{ route('orders.index') }}">Заказы</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>