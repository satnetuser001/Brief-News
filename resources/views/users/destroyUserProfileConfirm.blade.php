@extends('layouts.basic')

@section('title', 'Удалить пользователя')

@section('content')
<!-- Reused styles from the "Edit User Profile" -->
<div class="editUserProfile">
	<div class="namePage">
		<b>Вы действительно хотите удалить пользователя?</b>
	</div>

	<div class="userBeingDeletedInformation">
		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>ID:</label>
				<div>{{ $context->id }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Имя:</label>
				<div>{{ $context->name }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Фамилия:</label>
				<div>{{ $context->surname }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Псевдоним:</label>
				<div>{{ $context->nickname }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Роль:</label>
				<div>{{ $context->role }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Статус:</label>
				<div>{{ $context->status }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Email:</label>
				<div>{{ $context->email }}</div>
			</div>
		</div>

		<div class="userDataColumnSection">
			<div class="userDataColumn">
				<label>Создан:</label>
				<div>{{ $context->created_at }}</div>
			</div>
		</div>
	</div>

	<div class="saveCancel">
		<form action="{{ route('users.destroyUserProfile', [$context->id]) }}" method="POST">
			@csrf
			@method('DELETE')
			<input type="submit" value="Удалить" class="button htmlButtonStyleCorrection">
		</form>

		<a href="{{ route('users.allProfiles') }}" class="button">Отмена</a>
	</div>
</div>
@endsection