<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}::@yield('title')</title>
</head>
<body>

    <header>
        <section>
            <h1>Brief News</h1>
        </section>
        <section>
            {{-- some user data --}}
            @auth
                @if (Auth::user()->name)
                    Ваше имя <b>{{ Auth::user()->name }}</b><br>
                @endif   

                Ваши права <b>{{ Auth::user()->role }}</b><br>
            @endauth

            @guest
                гость<br>
            @endguest

            {{-- User interface buttons --}}

            <a href="{{ route('home') }}">Главная</a>

            @auth
                @if(Auth::user()->role == 'root' or Auth::user()->role == 'admin' or Auth::user()->role == 'writer')
                    <a href="#">Создать статью</a>
                    <a href="#">Мои статьи</a>
                @endif

                @if(Auth::user()->role == 'root' or Auth::user()->role == 'admin')
                    <a href="#">Все профили</a>
                @endif

                <a href="#">Мой профиль</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Выход">
                </form>
            @endauth

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Вход</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            @endguest
        </section>
        <hr>
    </header>

    <main>
        @yield('content')
        <hr>
    </main>

    <footer>
        <b>Footer:</b> Отсутствует на всех страницах :)
    </footer>

</body>
</html>