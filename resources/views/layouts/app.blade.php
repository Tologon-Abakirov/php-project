{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Добавьте здесь ваши стили, скрипты и другие мета-теги -->
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>