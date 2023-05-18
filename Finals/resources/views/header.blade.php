<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRISGEM</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   
</head>
<body>
<header>
    <nav class="navbar-vertical">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" onclick="window.location.href='{{route('dashboard')}}'">CrisGem Street Foods</a>
            </li>
            <li class="nav-item">
                <img class="img-responsive" src="/images/logo.png" onclick="window.location.href='{{route('dashboard')}}'" alt="logo">
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="window.location.href='{{route('dashboard')}}'">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="window.location.href='{{route('productPage')}}'">Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="window.location.href='{{route('expensePage')}}'">Product Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </nav>
</header>
 