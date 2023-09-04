<div class="rubricsAndLocalePanel">
    @if(array_key_exists('rubricsCombination', $context) and $context['rubricsCombination'] != NULL)
        <form action="{{ route(Route::currentRouteName()) }}" method="GET" name="returnRubricsCombinations">

            <!-- previous state of rubric combinations -->
            <input type="hidden" name="all" value="{{ $context['rubricsCombination']['all'] }}">
            <input type="hidden" name="policy" value="{{ $context['rubricsCombination']['policy'] }}">
            <input type="hidden" name="economy" value="{{ $context['rubricsCombination']['economy'] }}">
            <input type="hidden" name="science" value="{{ $context['rubricsCombination']['science'] }}">
            <input type="hidden" name="technologies" value="{{ $context['rubricsCombination']['technologies'] }}">
            <input type="hidden" name="sport" value="{{ $context['rubricsCombination']['sport'] }}">
            <input type="hidden" name="other" value="{{ $context['rubricsCombination']['other'] }}">
            <input type="hidden" name="world" value="{{ $context['rubricsCombination']['world'] }}">
            <input type="hidden" name="local" value="{{ $context['rubricsCombination']['local'] }}">

            <!-- selected rubric to change status -->
            <div class="buttonsSection">
                <button
                    name="pressed"
                    value="all"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['all'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Все
                </button>
                <button
                    name="pressed"
                    value="policy"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['policy'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Политика
                </button>
                <button
                    name="pressed"
                    value="economy"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['economy'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Экономика
                </button>
                <button
                    name="pressed"
                    value="science"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['science'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Наука
                </button>
                <button
                    name="pressed"
                    value="technologies"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['technologies'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Технологии
                </button>
                <button
                    name="pressed"
                    value="sport"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['sport'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Спорт
                </button>
                <button
                    name="pressed"
                    value="other"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['other'] == 1)
                                pressedRubric
                            @endif
                          "
                >
                    Остальные
                </button>
                <button
                    name="pressed"
                    value="world"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['world'] == 1)
                               pressedLocale
                            @endif
                          "
                >
                    Мировые
                </button>
                <button
                    name="pressed"
                    value="local"
                    class="
                            button
                            htmlButtonStyleCorrection
                            @if($context['rubricsCombination']['local'] == 1)
                                pressedLocale
                            @endif
                          "
                >
                    Локальные
                </button>
            </div>
        </form>
    @endif
</div>