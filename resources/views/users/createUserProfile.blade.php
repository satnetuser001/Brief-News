@extends('layouts.basic')

@section('title', 'Создать профиль пользователя')

@section('content')
    <div>
        <b>Создать профиль пользователя</b>
    </div>

    <form action="{{ route('users.storeUserProfile') }}" method="POST">

        @csrf
       
        <!-- Customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCreateUser')

        <!-- role -->
        <div>
            <label>Роль:</label>
                <select name="role">
                    <option value="writer" @if(old('role') == 'writer') selected @endif>writer</option>
                    <option value="admin" @if(old('role') == 'admin') selected @endif>admin</option>
                    <option value="reader" @if(old('role') == 'reader') selected @endif>reader</option>
                </select>
            @error('role')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- status -->
        <div>
            <label>Статус:</label>
                <select name="status">
                    <option value="active" @if(old('status') == 'active') selected @endif>активен</option>
                    <option value="ban" @if(old('status') == 'ban') selected @endif>бан</option>
                </select>
            @error('status')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- name -->
        <div>
            <label>Имя:</label>
            <input name="name" value="{{ old('name') }}">
            @error('name')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- surname -->
        <div>
            <label>Фамилия:</label>
            <input name="surname" value="{{ old('surname') }}">
            @error('surname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- nickname -->
        <div>
            <label>Псевдоним:</label>
            <input name="nickname" value="{{ old('nickname') }}">
            @error('nickname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- email -->
        <div>
            <label>Email:</label>
            <input name="email" value="{{ old('email') }}">
            @error('email')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- password -->
        <div>
            <label>Пароль:</label>
            <input name="password" value="{{ old('password') }}">
            @error('password')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>

    <!-- cancel -->
    <a href="{{ route('home') }}">Отмена</a>
@endsection