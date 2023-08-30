<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}::@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/styles/main.css">
</head>
<body>

    <header>
        <!-- logo -->
        @include('includes.logo')
        <div class="userGreeting">
            <div class="emptyBlock">
                <!-- empty block -->
            </div>
            <div class="greeting">
                <!-- user greeting -->
                <div>
                    Добро пожаловать, 
                    <b>
                        @guest
                            гость
                        @endguest

                        @auth
                            @if (Auth::user()->name)
                                {{ Auth::user()->name }}
                            @else
                                инкогнито
                            @endif
                        @endauth

                        !
                    </b><br>
                </div>

                <!-- auth user role -->
                <div>
                    @auth
                        Ваша роль: <b>{{ Auth::user()->role }}</b><br>
                    @endauth
                </div>
            </div>
        </div>
        <!-- user interface buttons -->
        <div class="userButtons">
            <a href="{{ route('home') }}" class="button">Главная</a>

            @auth
                @if(Auth::user()->role == 'root' or Auth::user()->role == 'admin' or Auth::user()->role == 'writer')
                    <a href="{{ route('articles.create') }}" class="button">Создать статью</a>
                    <a href="{{ route('articles.my') }}" class="button">Мои статьи</a>
                @endif

                @if(Auth::user()->role == 'root' or Auth::user()->role == 'admin')
                    <a href="{{ route('articles.trashed') }}" class="button">Удаленные статьи</a>
                    <a href="{{ route('users.allProfiles') }}" class="button">Все профили</a>
                    <a href="{{ route('users.createUserProfile') }}" class="button">Создать профиль</a>
                @endif

                <a href="{{ route('users.myProfile') }}" class="button">Мой профиль</a>

                @if(Auth::user()->role == 'root' or Auth::user()->role == 'admin')
                    <a href="{{ route('users.trashedUsersProfiles') }}" class="button">Удаленные профили</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="button exitButton" value="Выход">
                </form>
            @endauth

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="button">Вход</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button">Регистрация</a>
                @endif
            @endguest
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{--
    <hr>

    <footer>
        <b>Footer:</b> Отсутствует на всех страницах :)
    </footer>
    --}}

</body>
</html>