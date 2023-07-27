@extends('layouts.basic')

@section('title', 'Редактировать статью')

@section('content')
	<div>
		<b>Редактировать статью</b>
	</div>

	<form action="{{ route('articles.update', [$context['id']]) }}" method="POST">

		@csrf
		@method('PATCH')

		<div>
			<label>Выберите рубрики и локаль для статьи</label><br>
			<input type="checkbox" name="arrRubricsCombination[policy]" value="1"
				@if(old('arrRubricsCombination.policy') == 1 or (!old() and $context['rubricsCombination']['policy'] ==1))
					checked
				@endif
			>policy 
			<input type="checkbox" name="arrRubricsCombination[economy]" value="1"
				@if(old('arrRubricsCombination.economy') == 1 or (!old() and $context['rubricsCombination']['economy'] ==1))
					checked
				@endif
			>economy 
			<input type="checkbox" name="arrRubricsCombination[science]" value="1"
				@if(old('arrRubricsCombination.science') == 1 or (!old() and $context['rubricsCombination']['science'] ==1))
					checked
				@endif
			>science 
			<input type="checkbox" name="arrRubricsCombination[technologies]" value="1"
				@if(old('arrRubricsCombination.technologies') == 1 or (!old() and $context['rubricsCombination']['technologies'] ==1))
					checked
				@endif
			>technologies 
			<input type="checkbox" name="arrRubricsCombination[sport]" value="1"
				@if(old('arrRubricsCombination.sport') == 1 or (!old() and $context['rubricsCombination']['sport'] ==1))
					checked
				@endif
			>sport 
			<input type="checkbox" name="arrRubricsCombination[other]" value="1"
				@if(old('arrRubricsCombination.other') == 1 or (!old() and $context['rubricsCombination']['other'] ==1))
					checked
				@endif
			>other 
			<input type="checkbox" name="arrLocaleCombination[world]" value="1"
				@if(old('arrLocaleCombination.world') == 1 or (!old() and $context['rubricsCombination']['world'] ==1))
					checked
				@endif
			>world 
			<input type="checkbox" name="arrLocaleCombination[local]" value="1"
				@if(old('arrLocaleCombination.local') == 1 or (!old() and $context['rubricsCombination']['local'] ==1))
					checked
				@endif
			>local
		</div>
		@error('arrRubricsCombination')
			<span ><strong>{{ $message }}</strong></span><br>
		@enderror
		@error('arrLocaleCombination')
			<span ><strong>{{ $message }}</strong></span>
		@enderror

		<div>
			<label>Заголовок</label>
			<input name="header" value="{{ old('header', $context['header']) }}">
			@error('header')
				<span><strong>{{ $message }}</strong></span>
			@enderror
		</div>

		<div>
			<label>Статья</label>
			<textarea name="body">{{ old('body', $context['body']) }}</textarea>
			@error('body')
			<span ><strong>{{ $message }}</strong></span>
			@enderror
		</div>

		<div>
			<label>Ссылки на источники</label>
			@foreach($context['links'] as $objLink)
				<table>
					<tr>
						<td><a href="{{ $objLink->link }}">{{ $objLink->link }}</a></td>
						<td><input type="checkbox" name="arrDeletedLinks[{{ $objLink->id }}]" value="1"
								@if(old('arrDeletedLinks') and array_key_exists($objLink['id'], old('arrDeletedLinks')))
									checked
								@endif
							>удалить ссылку</td>
					</tr>
				</table>
			@endforeach
		</div>

		<div>
			<div name='links' id='links'></div>
			<input type='button' value='Добавить новую ссылку на источник' onclick="addLinkInput()">
		</div>
			{{--
			@error('links.*')
				<span><strong>{{ $message }}</strong></span>
			@enderror
			--}}
		<script type="text/javascript">
			let currentNumber = 0; 
				function addLinkInput(){
			    document.getElementById('links').innerHTML += "<input type='text' name='links[" + currentNumber + "]' /><br/>";
			    currentNumber++;
			}
		</script>
		<input type="submit" value="Сохранить">
	</form>
	<a href="{{ route('home') }}">Отмена</a>
@endsection