<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>

    <h1>Laravel 101</h1>
    <a href="/contact-us">Contactez-nous</a>
    <a href="/articles">Mes articles</a>
    @can('see-admin-menu')
        <a href="/articles/create">Créer un article</a>
    @endcan
    <a href="/about-us">A propos </a>
    @guest
        <a href="{{ route('register') }}">Créer un compte</a>
        <a href="{{ route('login') }}">Login</a>
    @endguest
    @can('create', 'App\Models\Article')
        <a href="/create-form">Créer un article</a>
    @endcan
    @auth
        <a href="{{ route('profile') }}">Votre profil</a>
        <form action="{{ route('logout') }}" method="POST">
            <input type="submit" value="Se déconnecter">
            {{ csrf_field() }}
        </form>
    @endauth

    @yield('content')
    <title>@yield('title')</title>
    @include('message.success')
    {{-- le modèle User contient une méthode 'can' et une méthode 'cant' ... --}}





</body>

</html>
