@extends('layouts.basic')

@section('title', 'Изменить пароль')

@section('content')
    <div>
        <b>Изменить пароль</b>
    </div>

    <form action="{{ route('users.updatePassword', [$context['id']]) }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- enter old password -->
        <div>
            <label>Введите текущий пароль:</label>
            <input type="password" name="currentPassword" >
            @error('currentPassword')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- enter new password -->
        <div>
            <label>Введите новый пароль:</label>
            <input type="password" name="newPassword" >
            @error('newPassword')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- enter new password again -->
        <div>
            <label>Введите новый пароль еще раз:</label>
            <input type="password" name="сonfirmNewPassword" >
            @error('сonfirmNewPassword')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>

    <!-- cancel -->
    <a href="{{ route('users.myProfile') }}">Отмена</a>
@endsection