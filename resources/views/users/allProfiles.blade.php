@extends('layouts.basic')

@section('title', 'Все профили')

@section('content')
    <div>
        <b>Все профили</b>
    </div>

    @if(count($context) > 0)
        <table>
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
                    <th>&nbsp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($context as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        @if(Auth::check() and $user->role != "root" or Auth::user()->role == "root")
                            <td>
                                <a href="{{ route('users.editUserProfile', ['user'=>$user->id]) }}">Редактировать</a>
                            </td>
                        @else
                            <th>&nbsp</th>
                        @endif
                        @if($user->role != "root")
                            <td>
                                <a href="{{ route('users.destroyConfirm', ['user'=>$user->id]) }}">Удалить</a>
                            </td>
                        @else
                            <th>&nbsp</th>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

    <!-- paginator -->
    <!-- need to add "if" to check if paginator method exists in object -->
    <div>{{ $context->links() }}</div>
    
@endsection