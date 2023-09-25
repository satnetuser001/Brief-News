@extends('layouts.basic')

@section('content')
<!-- Reused styles from Login page -->
<div class="loginPage">

    <div class="namePage">
        <b>Регистрация нового пользователя</b>
    </div>

    <form id="registerForm" method="POST" action="{{ route('register') }}" class="loginForm">
        @csrf

        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите Имя:</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    autofocus
                    class="loginInput"
                >
            </div>
            <div class="loginErrorMessage">
                @error('name')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите Email:</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
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
                <input type="password"  name="password" class="loginInput">
            </div>
            <div class="loginErrorMessage">
                    @error('password')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
        </div>

        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите Пароль еще раз:</label>
                <input type="password" name="password_confirmation" class="loginInput">
            </div>
        </div>
    </form>

    <button
        form="registerForm"
        type="submit"
        class="button restoreButtonInTableCorrection registerButton"
    >Зарегистрироватся</button>
</div>
@endsection
