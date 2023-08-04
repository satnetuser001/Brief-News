@extends('layouts.basic')

@section('title', 'Мой профиль')

@section('content')
    <div>
        <b>Мой профиль</b>
    </div>

    <div>
        ID учетной записи: {{ $context['id'] }}
    </div>


    <form action="{{ route('users.updateMyProfile', [$context['id']]) }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- User customization panel of rubrics and locale -->
        <div>
            <label>Выберите рубрики и локаль отображаемые по умолчанию на Главной странице</label><br>
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

        <!-- email -->
        <div>
            <label>Email:</label>
            <input name="email" value="{{ old('email', $context['email']) }}">
            @error('email')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- name -->
        <div>
            <label>Имя:</label>
            <input name="name" value="{{ old('name', $context['name']) }}">
            @error('name')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- surname -->
        <div>
            <label>Фамилия:</label>
            <input name="surname" value="{{ old('surname', $context['surname']) }}">
            @error('surname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- nickname -->
        <div>
            <label>Псевдоним:</label>
            <input name="nickname" value="{{ old('nickname', $context['nickname']) }}">
            @error('nickname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <a href="{{ route('users.editPassword') }}">Изменить пароль</a>
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>

    <!-- cancel -->
    <a href="{{ route('home') }}">Отмена</a>
@endsection