@extends('index')

@section('tittle', 'All Articles')

@section('content')
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="{{ route('register') }}" method="post">
                @csrf
                <input name="name" type="text" placeholder="Логин"/>
                <input name="password" type="password" placeholder="Пароль"/>
                <input name="email" type="text" placeholder="Email "/>
                <input type="submit" value="create">
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="{{ route('auth') }}" method="post">
                @csrf
                <input name="name" type="text" placeholder="Логин"/>
                <input name="password" type="password" placeholder="Пароль"/>
                <input type="submit" value="login">
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
@endsection
