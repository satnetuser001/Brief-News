@extends('layouts.basic')

@section('title', 'Создать профиль пользователя')

@section('content')
<!-- Reused styles from the "Edit User Profile" -->
<div class="editUserProfile">
    <div class="namePage">
        <b>Создать профиль пользователя</b>
    </div>

    <form
        id="createUserProfileForm"
        action="{{ route('users.storeUserProfile') }}"
        method="POST"
    >

        @csrf
       
        <!-- Customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCreateUser')

        <div class="userDataRow">

            <!-- role -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Роль:</label>
                    <div>
                        <select name="role" class="editUserProfileSelect">
                            <option value="writer" @if(old('role') == 'writer') selected @endif>writer</option>
                            <option value="admin" @if(old('role') == 'admin') selected @endif>admin</option>
                            <option value="reader" @if(old('role') == 'reader') selected @endif>reader</option>
                        </select>
                    </div>
                </div>
                <div class="userDataErrorMessage">
                    @error('role')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- status -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Статус:</label>
                    <div>
                        <select name="status" class="editUserProfileSelect">
                            <option value="active" @if(old('status') == 'active') selected @endif>активен</option>
                            <option value="ban" @if(old('status') == 'ban') selected @endif>бан</option>
                        </select>
                    </div>
                </div>
                <div class="userDataErrorMessage">
                    @error('status')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- name -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Имя:</label>
                    <input name="name" value="{{ old('name') }}" class="loginInput">
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
                    <input name="surname" value="{{ old('surname') }}" class="loginInput">
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
                    <input name="nickname" value="{{ old('nickname') }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('nickname')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- email -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Email:</label>
                    <input name="email" value="{{ old('email') }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('email')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- password -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Пароль:</label>
                    <input name="password" value="{{ old('password') }}" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('password')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </form>

    <div class="saveCancel">
        <button type="submit" form="createUserProfileForm" class="button htmlButtonStyleCorrection">Сохранить</button>
        <a href="{{ route('home') }}" class="button">Отмена</a>
    </div>
</div>
@endsection