@extends('layouts.basic')

@section('title', 'Изменить профиль пользователя')

@section('content')
    <div>
        <b>Изменить профиль пользователя {{ $context['nickname'] }}</b>
    </div>

    <form action="{{ route('users.updateUserProfile', [$context['id']]) }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- Customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCustomizer')

        <!-- ID -->
        <div>
            ID учетной записи: {{ $context['id'] }}
        </div>

        <!-- created_at -->
        <div>
            Учетная запись создана: {{ $context['created_at'] }}
        </div>

        <!-- updated_at -->
        <div>
            Учетная запись обновлена: {{ $context['updated_at'] }}
        </div>

        <!-- role -->
        <div>
            <label>Роль:</label>
            @if($context['role'] != 'root')
                <select name="role">
                    <option value="admin" @if($context['role'] == 'admin') selected @endif>admin</option>
                    <option value="writer" @if($context['role'] == 'writer') selected @endif>writer</option>
                    <option value="reader" @if($context['role'] == 'reader') selected @endif>reader</option>
                </select>
            @else
                root
                <input type="hidden" name="role" value="root">
            @endif
            @error('role')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- status -->
        <div>
            <label>Статус:</label>
            @if($context['role'] != 'root' and $context['role'] != 'admin')
                <select name="status">
                    <option value="active" @if($context['status'] == 'active') selected @endif>активен</option>
                    <option value="ban" @if($context['status'] == 'ban') selected @endif>бан</option>
                </select>
            @else
                активен
                <input type="hidden" name="status" value="active">
            @endif
            @error('status')
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

        <!-- email -->
        <div>
            <label>Email:</label>
            <input name="email" value="{{ old('email', $context['email']) }}">
            @error('email')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- change password -->
        <div>
            <input type="checkbox" name="editPassword" value="true"
                @if(old('editPassword') == true)
                    checked
                @endif
            >
            <label>Изменить пароль:</label>
            <input name="newPassword" value="{{ old('newPassword') }}" placeholder="не изменится">
            @error('newPassword')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>

    <!-- cancel -->
    <a href="{{ route('users.allProfiles') }}">Отмена</a>
@endsection