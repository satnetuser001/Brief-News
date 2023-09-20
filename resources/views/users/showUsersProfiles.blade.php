@extends('layouts.basic')

@if(Route::is('users.allProfiles'))
    @section('title', 'Все профили')
@elseif(Route::is('users.trashedUsersProfiles'))
    @section('title', 'Удаленные профили')
@else
    @section('title', 'Маршрут не распознан')
@endif
        

@section('content')
<div class="showUserProfiles">
    <div class="namePage">
        <b>
            @if(Route::is('users.allProfiles'))
                Все профили
            @elseif(Route::is('users.trashedUsersProfiles'))
                Удаленные профили
            @else
                Маршрут не распознан
            @endif
        </b>
    </div>

    <div>
        @if(count($context) > 0)
            <table class="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Псевдоним</th>
                        <th>Роль</th>
                        <th>Статус</th>
                        <th>Email</th>
                        <th>Дата создания</th>
                        <th>&nbsp</th>
                        @if(Route::is('users.allProfiles'))
                            <th>&nbsp</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($context as $user)
                        <tr
                            @if($loop->odd)
                                class="oddRow"
                            @endif
                        >
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            @if(Route::is('users.allProfiles'))
                                @if($user->role != "root" or Auth::user()->role == "root")
                                    <td>
                                        <a
                                            href="{{ route('users.editUserProfile', ['user'=>$user->id]) }}"
                                            class="buttonInTable"
                                        >Редактировать</a>
                                    </td>
                                @else
                                    <td>&nbsp</td>
                                @endif
                                @if($user->role != "root")
                                    <td>
                                        <a
                                            href="{{ route('users.destroyUserProfileConfirm', ['user'=>$user->id]) }}"
                                            class="buttonInTable"
                                        >Удалить</a>
                                    </td>
                                @else
                                    <td>&nbsp</td>
                                @endif
                            @elseif(Route::is('users.trashedUsersProfiles'))
                                <td>
                                    <form action="{{ route('users.restoreUserProfile', ['id'=>$user->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input
                                            type="submit"
                                            value="Восстановить"
                                            class="buttonInTable restoreButtonInTableCorrection"
                                        >
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- pagination -->
    {{ $context->links() }}
</div>
@endsection