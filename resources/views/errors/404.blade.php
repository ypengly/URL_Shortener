<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link not found — ShortLink</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <main class="container page not-found">
        <h1>404</h1>
        <p>This short link doesn't exist, or it may have been deleted.</p>
        <a href="{{ url('/') }}" class="btn">Go back home</a>
    </main>
</body>
</html>
