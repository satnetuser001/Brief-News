<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>

    {{--
	<form action="{{ route('users.updateUserProfile', '1') }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- Customization panel of rubrics and locale -->
        <div>
		    <label>Выберите рубрики и локаль отображаемые по умолчанию на Главной странице</label><br>
		    <input type="checkbox" name="arrRubricsCombination[policy]" value="1">policy 
		    <input type="checkbox" name="arrRubricsCombination[economy]" value="1">economy 
		    <input type="checkbox" name="arrRubricsCombination[science]" value="1">science 
		    <input type="checkbox" name="arrRubricsCombination[technologies]" value="1">technologies 
		    <input type="checkbox" name="arrRubricsCombination[sport]" value="1">sport 
		    <input type="checkbox" name="arrRubricsCombination[other]" value="1">other 
		    <input type="checkbox" name="arrLocaleCombination[world]" value="1">world 
		    <input type="checkbox" name="arrLocaleCombination[local]" value="1">local
		</div>
		@error('arrRubricsCombination')
		    <span ><strong>{{ $message }}</strong></span><br>
		@enderror
		@error('arrLocaleCombination')
		    <span ><strong>{{ $message }}</strong></span>
		@enderror

        <!-- role -->
        <div>
            <label>Роль:</label>
                root
                <input type="hidden" name="role" value="root">
            @error('role')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- status -->
        <div>
            <label>Статус:</label>
                активен
                <input type="hidden" name="status" value="active">
            @error('status')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- name -->
        <div>
            <label>Имя:</label>
            <input name="name" value="rootName">
            @error('name')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- surname -->
        <div>
            <label>Фамилия:</label>
            <input name="surname" value="rootSurname">
            @error('surname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- nickname -->
        <div>
            <label>Псевдоним:</label>
            <input name="nickname" value="incognito">
            @error('nickname')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- email -->
        <div>
            <label>Email:</label>
            <input name="email" value="root@gmail.com">
            @error('email')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- change password -->
        <div>
            <input type="checkbox" name="editPassword" value="true"
                @if(old('editPassword') == true)
                    checked
                @endif
            >
            <label>Изменить пароль:</label>
            <input name="newPassword" value="{{ old('newPassword') }}" placeholder="не изменится">
            @error('newPassword')
                <span><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- save -->
        <input type="submit" value="Сохранить">
    </form>
    --}}


<h3>Context Display</h3>

<pre>
    @php
        var_dump($context);
    @endphp
</pre>

@if(old())
	<h3>Old Display</h3>
	@php
        var_dump(old());
    @endphp
@endif

<!-- debugging -->
{{--
	@if(array_key_exists('debugging', $context) and $context['debugging'] != NULL)
	    <?php
	        echo '<pre>';
	        var_dump($context);
	        echo '</pre>'
	    ?>
	@endif
--}}

</body>
</html>