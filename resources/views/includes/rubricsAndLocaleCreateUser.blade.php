<!-- Reused styles from the "Create Article Page" -->
<div class="rubricsAndLocaleSelectionSection">
    <label><b>Выберите рубрики и локаль отображаемые по умолчанию на Главной странице</b></label>
    <div class="rubricsAndLocale">
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[policy]" value="1"
                @if(old('arrRubricsCombination.policy') == 1 or !old())
                    checked
                @endif
            >
            <div>Политика</div>
        </div>
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[economy]" value="1"
                @if(old('arrRubricsCombination.economy') == 1 or !old())
                    checked
                @endif
            >
            <div>Экономика</div>
        </div>
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[science]" value="1"
                @if(old('arrRubricsCombination.science') == 1 or !old())
                    checked
                @endif
            >
            <div>Наука</div>
        </div>
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[technologies]" value="1"
                @if(old('arrRubricsCombination.technologies') == 1 or !old())
                    checked
                @endif
            >
            <div>Технологии</div>
        </div>
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[sport]" value="1"
                @if(old('arrRubricsCombination.sport') == 1 or !old())
                    checked
                @endif
            >
            <div>Спорт</div>
        </div>
        <div class="rubric">
            <input type="checkbox" name="arrRubricsCombination[other]" value="1"
                @if(old('arrRubricsCombination.other') == 1 or !old())
                    checked
                @endif
            >
            <div>Остальные</div>
        </div>
        <div class="locale">
            <input type="checkbox" name="arrLocaleCombination[world]" value="1"
                @if(old('arrLocaleCombination.world') == 1 or !old())
                    checked
                @endif
            >
            <div>Мировые</div>
        </div>
        <div class="locale">
            <input type="checkbox" name="arrLocaleCombination[local]" value="1"
                @if(old('arrLocaleCombination.local') == 1 or !old())
                    checked
                @endif
            >
            <div>Локальные</div>
        </div>
    </div>
    <div class="errorMessage">
        @error('arrRubricsCombination')
            <strong>{{ $message }}</strong>
        @enderror
        @error('arrLocaleCombination')
            <strong>{{ $message }}</strong>
        @enderror
    </div>
</div>
