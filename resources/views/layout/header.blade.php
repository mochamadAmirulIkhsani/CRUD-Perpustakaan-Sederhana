<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Data Buku</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Manajemen Data Buku</h1>
        @if (Auth::check())
            <div style="text-align: center; margin-bottom: 10px;">
                <p style="margin-botton: 10px;">Anda Login sebagai <strong>{{ Auth::user()->name }}</strong></p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="tombol">Logout</button>
                </form>
            </div>
        @endif
        <div class="nav">
            <ul>
                <li><a href="/kategori">Kategori</a></li>
                <li><a href="/penerbit">Penerbit</a></li>
                <li><a href="/buku">Buku</a></li>
            </ul>
        </div>
