@extends('layouts.basic')

@section('title', 'Изменить профиль пользователя')

@section('content')
<div class="editUserProfile">
    <div class="namePage">
        <b>Изменить профиль пользователя {{ $context['nickname'] }}</b>
    </div>

    <form
        id="editUserProfileForm"
        action="{{ route('users.updateUserProfile', [$context['id']]) }}"
        method="POST"
    >

        @csrf
        @method('PATCH')

        <!-- Customization panel of rubrics and locale -->
        @include('includes.rubricsAndLocaleCustomizer')

        <div class="userDataRow">

            {{--
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Some</label>
                    <input type="" name=""> or <div>data</div>
                </div>
                <div class="loginErrorMessage">
                    error
                </div>
            </div>
            --}}

            <!-- ID -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>ID учетной записи:</label>
                    <div>{{ $context['id'] }}</div>
                </div>
            </div>

            <!-- created_at -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Учетная запись создана:</label>
                    <div>{{ $context['created_at'] }}</div>
                </div>
            </div>

            <!-- updated_at -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Учетная запись обновлена:</label>
                    <div>{{ $context['updated_at'] }}</div>
                </div>
            </div>

            <!-- role -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Роль:</label>
                    <div>
                        @if($context['role'] != 'root')
                            <select name="role" class="editUserProfileSelect">
                                <option value="admin" @if($context['role'] == 'admin') selected @endif>admin</option>
                                <option value="writer" @if($context['role'] == 'writer') selected @endif>writer</option>
                                <option value="reader" @if($context['role'] == 'reader') selected @endif>reader</option>
                            </select>
                        @else
                            <div>root</div>
                            <input type="hidden" name="role" value="root">
                        @endif
                    </div>
                </div>
                <div class="userDataErrorMessage">
                    @error('role')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <!-- status -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <label>Статус:</label>
                    <div>
                        @if($context['role'] != 'root' and $context['role'] != 'admin')
                            <select name="status" class="editUserProfileSelect">
                                <option value="active" @if($context['status'] == 'active') selected @endif>активен</option>
                                <option value="ban" @if($context['status'] == 'ban') selected @endif>бан</option>
                            </select>
                        @else
                            <div>активен</div>
                            <input type="hidden" name="status" value="active">
                        @endif
                    </div>
                </div>
                <div class="userDataErrorMessage">
                    @error('status')
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
                    @enderror
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
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <!-- change password -->
            <div class="userDataColumnSection">
                <div class="userDataColumn">
                    <div>
                        <input type="checkbox" name="editPassword" value="true"
                            @if(old('editPassword') == true)
                                checked
                            @endif
                        >
                        <label>Изменить пароль:</label>
                    </div>
                    <input name="newPassword" value="{{ old('newPassword') }}" placeholder="не изменится" class="loginInput">
                </div>
                <div class="userDataErrorMessage">
                    @error('newPassword')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </form>

    <div class="saveCancel">
        <button type="submit" form="editUserProfileForm" class="button htmlButtonStyleCorrection">Сохранить</button>
        <a href="{{ route('users.allProfiles') }}" class="button">Отмена</a>
    </div>
</div>
@endsection