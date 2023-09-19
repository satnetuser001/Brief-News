@extends('layouts.basic')

@section('title', 'Редактировать статью')

@section('content')
<!-- Reused styles from the "Create Article Page" -->
<div class="createArticlePage">
	<div class="namePage">
		<b>Редактировать статью</b>
	</div>

	<form id="createArticleForm" action="{{ route('articles.update', [$context['id']]) }}" method="POST">

		@csrf
		@method('PATCH')

		<div class="rubricsAndLocaleSelectionSection">
			<label><b>Рубрики и локаль</b></label>
			<div class="rubricsAndLocale">
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[policy]"
						value="1"
						@if(
								old('arrRubricsCombination.policy') == 1 or
								(
									!old() and
									$context['rubricsCombination']['policy'] ==1
								)
							)
							checked
						@endif
					>
					<div>Политика</div>
				</div>
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[economy]"
						value="1"
						@if(
								old('arrRubricsCombination.economy') == 1 or
								(
									!old() and
									$context['rubricsCombination']['economy'] ==1
								)
							)
							checked
						@endif
					>
					<div>Экономика</div>
				</div>
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[science]"
						value="1"
						@if(
								old('arrRubricsCombination.science') == 1 or
								(
									!old() and
									$context['rubricsCombination']['science'] ==1
								)
							)
							checked
						@endif
					>
					<div>Наука</div>
				</div>
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[technologies]"
						value="1"
						@if(
								old('arrRubricsCombination.technologies') == 1 or
								(
									!old() and
									$context['rubricsCombination']['technologies'] ==1
								)
							)
							checked
						@endif
					>
					<div>Технологии</div>
				</div>
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[sport]"
						value="1"
						@if(
								old('arrRubricsCombination.sport') == 1 or
								(
									!old() and
									$context['rubricsCombination']['sport'] ==1
								)
							)
							checked
						@endif
					>
					<div>Спорт</div>
				</div>
				<div class="rubric">
					<input
						type="checkbox"
						name="arrRubricsCombination[other]"
						value="1"
						@if(
								old('arrRubricsCombination.other') == 1 or
								(
									!old() and
									$context['rubricsCombination']['other'] ==1
								)
							)
							checked
						@endif
					>
					<div>Остальные</div>
				</div>
				<div class="locale">
					<input
						type="checkbox"
						name="arrLocaleCombination[world]"
						value="1"
						@if(
								old('arrLocaleCombination.world') == 1 or
								(
									!old() and
									$context['rubricsCombination']['world'] ==1
								)
							)
							checked
						@endif
					>
					<div>Мировые</div>
				</div>
				<div class="locale">
					<input
						type="checkbox"
						name="arrLocaleCombination[local]"
						value="1"
						@if(
								old('arrLocaleCombination.local') == 1 or
								(
									!old() and
									$context['rubricsCombination']['local'] ==1
								)
							)
							checked
						@endif
					>
					<div>Локальные</div>
				</div>
			</div>
			<div class="errorMessage">
				@error('arrRubricsCombination')
					<span><strong>{{ $message }}</strong></span><br>
				@enderror
				@error('arrLocaleCombination')
					<span><strong>{{ $message }}</strong></span>
				@enderror
			</div>
		</div>

		<div class="header">
			<label><b>Заголовок</b></label>
			<input name="header" value="{{ old('header', $context['header']) }}" class="articleHeaderInput">
			<div class="errorMessage">
				@error('header')
					<span><strong>{{ $message }}</strong></span>
				@enderror
			</div>
		</div>

		<div class="body">
			<label><b>Статья</b></label>
			<textarea name="body" class="articleBodyInput">{{ old('body', $context['body']) }}</textarea>
			<div class="errorMessage">
				@error('body')
					<span ><strong>{{ $message }}</strong></span>
				@enderror
			</div>
		</div>

		<div class="sourcesLinks">
			<label><b>Ссылки на источники</b></label>
			<div>
				@foreach($context['links'] as $objLink)
					<table>
						<tr>
							<td><a href="{{ $objLink->link }}">{{ $objLink->link }}</a></td>
							<td>
								<input
									type="checkbox"
									name="arrDeletedLinks[{{ $objLink->id }}]"
									value="1"
									@if(
											old('arrDeletedLinks') and
											array_key_exists($objLink['id'], old('arrDeletedLinks'))
										)
										checked
									@endif
								>удалить ссылку
							</td>
						</tr>
					</table>
				@endforeach
			</div>

			<div>
				<div name='links' id='links'></div>
				<input
					type='button'
					value='Добавить ссылку'
					onclick="addLinkInput()"
					class="button htmlButtonStyleCorrection"
				>
			</div>
			<div>
				<script type="text/javascript">
					let currentNumber = 0; 
						function addLinkInput(){
					    document.getElementById('links').innerHTML += "<input type='text' name='links[" + currentNumber + "]' /><br/>";
					    currentNumber++;
					}
				</script>
			</div>
		</div>
	</form>

	<div class="saveCancel">
		<button type="submit" form="createArticleForm" class="button htmlButtonStyleCorrection">Сохранить</button>
		<a href="{{ route('home') }}" class="button">Отмена</a>		
	</div>
</div>
@endsection