<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Placeholder - Perpustakaan</title>
</head>
<body style="font-family: Inter, sans-serif; padding: 32px; background: #F7F8FA; color: #1F2937;">
    <h1>Dashboard Placeholder</h1>
    <p>Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->email }}).</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="background: #C94A4A; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer;">Logout</button>
    </form>
</body>
</html>
