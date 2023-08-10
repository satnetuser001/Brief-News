@extends('layouts.basic')

@section('title', 'Создать статью')

@section('content')
	<div>
		<b>Создать статью</b>
	</div>

	<form action="{{ route('articles.store') }}" method="POST">

		@csrf

		<div>
			<label>Выберите рубрики и локаль для статьи</label><br>
			<input type="checkbox" name="arrRubricsCombination[policy]" value="1"
				@if(old('arrRubricsCombination.policy') == 1)
					checked
				@endif
			>policy 
			<input type="checkbox" name="arrRubricsCombination[economy]" value="1"
				@if(old('arrRubricsCombination.economy') == 1)
					checked
				@endif
			>economy 
			<input type="checkbox" name="arrRubricsCombination[science]" value="1"
				@if(old('arrRubricsCombination.science') == 1)
					checked
				@endif
			>science 
			<input type="checkbox" name="arrRubricsCombination[technologies]" value="1"
				@if(old('arrRubricsCombination.technologies') == 1)
					checked
				@endif
			>technologies 
			<input type="checkbox" name="arrRubricsCombination[sport]" value="1"
				@if(old('arrRubricsCombination.sport') == 1)
					checked
				@endif
			>sport 
			<input type="checkbox" name="arrRubricsCombination[other]" value="1"
				@if(old('arrRubricsCombination.other') == 1)
					checked
				@endif
			>other 
			<input type="checkbox" name="arrLocaleCombination[world]" value="1"
				@if(old('arrLocaleCombination.world') == 1)
					checked
				@endif
			>world 
			<input type="checkbox" name="arrLocaleCombination[local]" value="1"
				@if(old('arrLocaleCombination.local') == 1)
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
			<input name="header" value="{{ old('header') }}">
			@error('header')
				<span><strong>{{ $message }}</strong></span>
			@enderror
		</div>

		<div>
			<label>Статья</label>
			<textarea name="body">{{ old('body') }}</textarea>
			@error('body')
			<span ><strong>{{ $message }}</strong></span>
			@enderror
		</div>

		<div>
			<div name='links' id='links'></div>
			<input type='button' value='Добавить ссылку на источник' onclick="addLinkInput()">
		</div>
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