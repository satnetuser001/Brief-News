@extends('layouts.basic')

@section('title', 'Мой профиль')

@section('content')
    <div>
        <b>Мой профиль</b>
    </div>

    <div>
        ID учетной записи: {{ $context['id'] }}
    </div>


    <form action="{{ route('users.updateMyProfile', [$context['id']]) }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- User customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCustomizer')

        <!-- email -->
        <div>
            <label>Email:</label>
            <input name="email" value="{{ old('email', $context['email']) }}">
            @error('email')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- name -->
        <div>
            <label>Имя:</label>
            <input name="name" value="{{ old('name', $context['name']) }}">
            @error('name')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- surname -->
        <div>
            <label>Фамилия:</label>
            <input name="surname" value="{{ old('surname', $context['surname']) }}">
            @error('surname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- nickname -->
        <div>
            <label>Псевдоним:</label>
            <input name="nickname" value="{{ old('nickname', $context['nickname']) }}">
            @error('nickname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <a href="{{ route('users.editPassword') }}">Изменить пароль</a>
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>

    <!-- cancel -->
    <a href="{{ route('home') }}">Отмена</a>
@endsection