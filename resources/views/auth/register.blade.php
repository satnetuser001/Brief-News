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
            <label>Имя</label>
            <div>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    autofocus
                    class="loginInput"
                >
                <div class="errorMessage">
                    @error('name')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="loginInputSection">
            <label>Email</label>
            <div>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="loginInput"
                >
                <div class="errorMessage">
                    @error('email')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="loginInputSection">
            <label>Пароль</label>
            <div>
                <input type="password"  name="password" class="loginInput">
                <div class="errorMessage">
                    @error('password')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="loginInputSection">
            <label>Пароль еще раз</label>
            <div>
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
