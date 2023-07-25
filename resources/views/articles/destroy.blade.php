@extends('layouts.basic')

@section('title', 'Удалить статью')

@section('content')
	<div>
		<b>Вы действительно хотите удалить статью?</b>
	</div>

	<div>
		{{ $context->header }}
	</div>

	<div>
		<b>Автор:</b>
		<div>
			ID: {{ $context->user->id }}
		</div>

		@isset($context->user->surname)
			<div>
				Фамилия: {{ $context->user->surname }}
			</div>
		@endisset

		@isset($context->user->name)
			<div>
				Имя: {{ $context->user->name }}
			</div>
		@endisset
	</div>

	<form action="{{ route('articles.destroy', [$context->id]) }}" method="POST">
		@csrf
		@method('DELETE')
		<input type="submit" value="Удалить">
	</form>

	<a href="{{ route('home') }}">Отмена</a>
@endsection