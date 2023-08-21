@extends('layouts.basic')

@section('content')
<div>
    <b>Вход на сайт</b>
</div>

<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Введите Ваш Email</label>

            <div>
                <input type="email" name="email" value="{{ old('email') }}" autofocus>

                @error('email')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password">Введите Ваш пароль</label>

            <div>
                <input type="password" name="password">

                @error('password')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{--
        <!-- to do -->
        <div>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label>Запомнить меня</label>
        </div>
        --}}

        <div>
            <button type="submit">
                Войти
            </button>

            {{--
            <!-- to do -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            --}}

        </div>
    </form>
</div>
@endsection