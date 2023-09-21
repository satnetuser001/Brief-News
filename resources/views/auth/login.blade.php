@extends('layouts.basic')

@section('content')
<div class="loginPage">

    <div class="namePage">
        <b>Вход на сайт</b>
    </div>

    <form id="loginForm" method="POST" action="{{ route('login') }}" class="loginForm">
        @csrf

        <div class="loginInputSection">
            <label>Введите Ваш Email</label>
            <div>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autofocus
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
            <label for="password">Введите Ваш пароль</label>
            <div>
                <input type="password" name="password" class="loginInput">
                <div class="errorMessage">
                    @error('password')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div> 
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