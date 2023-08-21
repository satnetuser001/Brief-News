@extends('layouts.basic')

@section('content')
<div>
    <b>Регистрация нового пользователя</b>
</div>

<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label>Имя</label>

            <div>
                <input type="text" name="name" value="{{ old('name') }}" autofocus>

                @error('name')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label>Email</label>

            <div>
                <input type="email" name="email" value="{{ old('email') }}">

                @error('email')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label>Пароль</label>

            <div>
                <input type="password"  name="password">

                @error('password')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label>Пароль еще раз</label>

            <div>
                <input type="password" name="password_confirmation">
            </div>
        </div>

        <div>
            <button type="submit">Зарегистрироватся</button>
        </div>
    </form>
</div>
@endsection
