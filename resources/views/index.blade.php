<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav-user-name-exit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add-articles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-content.css') }}">
    <title>@yield('tittle', 'Main')</title>
</head>
<body>
<div class="header">
    <div class="header-menu">
        <a href="{{ route('index') }}">Главная</a>
        <a href="{{ route('articles.index') }}">Статьи</a>
        @auth
            <a href="{{ route('articles.create') }}">Добавить</a>
        @endauth
    </div>
    @guest
        <div class="header-auth">
            <a href="{{ route('auth.index') }}">Авторизация</a>
        </div>
    @else
        <div class="header-auth">

            <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">  {{ \Auth::user()->name }}
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <form id="personal-area" action="{{ route('personal-area', Auth::user()->id) }}" method="post">
                        @csrf
                        <button id="dropdown-content-presonal-area" form="personal-area" type="submit">Личный кабинет
                        </button>
                    </form>
                    <form id="personal-articles" action="{{ route('personal-articles', Auth::user()->id) }}"
                          method="post">
                        @csrf
                        <button id="dropdown-content-presonal-area" form="personal-articles" type="submit">Показать
                            статьи
                        </button>
                    </form>
                    <form id="logout" action="{{ route('logout', Auth::user()) }}" method="post">
                        @csrf
                        <button id="dropdown-content-logout" form="logout" type="submit">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
    @endguest
</div>

@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/swap-auth-reg.js') }}"></script>
</body>
</html>
