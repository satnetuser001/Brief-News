@extends('layouts.basic')

@section('title', 'Удалить статью')

@section('content')
<!-- Reused styles from different pages -->
<div class="createArticlePage">
	<div class="namePage">
		<b>Удалить статью?</b>
	</div>
	
	<label class="deleteArticleHeader">
	    <div class="articleCreationDate">{{ $context->created_at }}</div>
	    <div class="articleName">
	        <b>{{ $context->header }}</b>
	    </div>
	</label>

	<div class="saveCancel">
		<form action="{{ route('articles.destroy', [$context->id]) }}" method="POST">
			@csrf
			@method('DELETE')
			<input type="submit" value="Удалить" class="button htmlButtonStyleCorrection">
		</form>

		<a href="{{ route('home') }}" class="button">Отмена</a>
	</div>
</div>
@endsection