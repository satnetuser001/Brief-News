@extends('layouts.basic')

@section('title', 'Удалить пользователя')

@section('content')
	<div>
		<b>Вы действительно хотите удалить пользователя?</b>
	</div>

	<div>
		ID: {{ $context->id }}
	</div>

	<div>
		Имя: {{ $context->name }}
	</div>

	<div>
		Фамилия: {{ $context->surname }}
	</div>

	<div>
		Псевдоним: {{ $context->nickname }}
	</div>

	<div>
		Роль: {{ $context->role }}
	</div>

	<div>
		Статус: {{ $context->status }}
	</div>

	<div>
		Email: {{ $context->email }}
	</div>

	<div>
		Создан: {{ $context->created_at }}
	</div>

	<form action="{{ route('users.destroy', [$context->id]) }}" method="POST">
		@csrf
		@method('DELETE')
		<input type="submit" value="Удалить">
	</form>

	<a href="{{ route('users.allProfiles') }}">Отмена</a>
@endsection