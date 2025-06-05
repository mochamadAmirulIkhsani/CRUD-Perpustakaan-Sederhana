<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>
<body>
<div class="container" style="max-width: 400px">
    <h1>Form Login</h1>
    <form action="{{ route('loginProses') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Masukkan Email...">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Masukkan Password...">
        </div>
        <button type="submit" class="tombol">Login</button>
    </form>
</div>
</body>
</html>
