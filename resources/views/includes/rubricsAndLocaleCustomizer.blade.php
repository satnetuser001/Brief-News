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