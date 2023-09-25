@extends('layouts.basic')

@section('content')
<div class="loginPage">

    <div class="namePage">
        <b>Вход на сайт</b>
    </div>

    <form id="loginForm" method="POST" action="{{ route('login') }}" class="loginForm">
        @csrf

        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите Email:</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autofocus
                    class="loginInput"
                >
            </div>
            <div class="loginErrorMessage">
                @error('email')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите Пароль:</label>
                <input type="password" name="password" class="loginInput">
            </div>
            <div class="loginErrorMessage">
                @error('password')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

    </form>

    <button
        form="loginForm"
        type="submit"
        class="button restoreButtonInTableCorrection loginButton"
    >Войти</button>
</div>
@endsection