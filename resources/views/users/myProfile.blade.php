@extends('layouts.basic')

@section('title', 'Мой профиль')

@section('content')
<!-- Reused styles from the "Edit User Profile" -->
<div class="editUserProfile">
    <div class="namePage">
        <b>Мой профиль</b>
    </div>

    <form
        id="editMyProfileForm"
        action="{{ route('users.updateMyProfile', [$context['id']]) }}"
        method="POST"
    >

        @csrf
        @method('PATCH')

        <!-- User customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCustomizer')

        <div class="userDataRow">

            <!-- ID -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>ID учетной записи:</label>
                    <div>{{ $context['id'] }}</div>
                </div>
            </div>

            <!-- email -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Email:</label>
                    <input name="email" value="{{ old('email', $context['email']) }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('email')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- name -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Имя:</label>
                    <input name="name" value="{{ old('name', $context['name']) }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('name')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- surname -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Фамилия:</label>
                    <input name="surname" value="{{ old('surname', $context['surname']) }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('surname')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- nickname -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Псевдоним:</label>
                    <input name="nickname" value="{{ old('nickname', $context['nickname']) }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('nickname')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <a href="{{ route('users.editPassword') }}" class="editPasswordButton">Изменить пароль</a>

        </div>
    </form>

    <div class="saveCancel">
        <button type="submit" form="editMyProfileForm" class="button htmlButtonStyleCorrection">Сохранить</button>
        <a href="{{ route('home') }}" class="button">Отмена</a>
    </div>
</div>
@endsection