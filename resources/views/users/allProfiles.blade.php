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
                    <th>id</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>nickname</th>
                    <th>role</th>
                    <th>status</th>
                    <th>email</th>
                    <th>rubrick_id</th>
                    <th>created_at</th>
                    <th>deleted_at</th>
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
                        <td>{{ $user->rubrics_combination_id }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->deleted_at }}</td>
                        <td>
                            <a href="{{ route('users.editUserProfile', ['user'=>$user->id]) }}">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

    <!-- paginator -->
    <!-- need to add "if" to check if paginator method exists in object -->
    <div>{{ $context->links() }}</div>
    
@endsection