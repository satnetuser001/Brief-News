@extends('layouts.basic')

@section('title', 'Изменить пароль')

@section('content')
<!-- Reused styles from Login page -->
<div class="loginPage">

    <div class="namePage">
        <b>Изменить пароль</b>
    </div>

    <form
        id="editPasswordForm"
        action="{{ route('users.updatePassword', [$context['id']]) }}"
        method="POST"
        class="loginForm"
    >

        @csrf
        @method('PATCH')

        <!-- enter old password -->
        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите текущий пароль:</label>
                <input type="password" name="currentPassword" class="loginInput">
            </div>
            <div class="loginErrorMessage">
                @error('currentPassword')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>  

        <!-- enter new password -->
        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите новый пароль:</label>
                <input type="password" name="newPassword" class="loginInput">
            </div>
            <div class="loginErrorMessage">
                @error('newPassword')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- enter new password again -->
        <div class="loginInputSection">
            <div class="loginLableInput">
                <label>Введите новый пароль еще раз:</label>
                <input type="password" name="сonfirmNewPassword" class="loginInput">
            </div>
            <div class="loginErrorMessage">
                @error('сonfirmNewPassword')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
    </form>

    <!-- save and cancel -->
    <div class="editPasswordSaveCancel">
        <button
            form="editPasswordForm"
            type="submit"
            class="button htmlButtonStyleCorrection"
        >Сохранить</button>
        <a href="{{ route('users.myProfile') }}" class="button">Отмена</a>
    </div>
</div>
@endsection