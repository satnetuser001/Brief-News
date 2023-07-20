@extends('layouts.basic')

@if($context['route'] == 'home')
    @section('title', 'Главная')
@else
    @section('title', 'Мои статьи')
@endif

@section('content')
    <b>
        @if($context['route'] == 'home')
            Главная
        @else
            Мои статьи
        @endif
    </b><br>

    <!-- Panel for sorting articles by rubrics and locale -->
    @if(array_key_exists('rubricsCombination', $context) and $context['rubricsCombination'] != NULL)
        <form action="{{ route($context['route']) }}" method="GET" name="returnRubricsCombinations">

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
            <button name="pressed" value="all" @if($context['rubricsCombination']['all'] == 1) style="color: red" @endif>
                all
            </button>
            <button name="pressed" value="policy" @if($context['rubricsCombination']['policy'] == 1) style="color: red" @endif>
                policy
            </button>
            <button name="pressed" value="economy" @if($context['rubricsCombination']['economy'] == 1) style="color: red" @endif>
                economy
            </button>
            <button name="pressed" value="science" @if($context['rubricsCombination']['science'] == 1) style="color: red" @endif>
                science
            </button>
            <button name="pressed" value="technologies" @if($context['rubricsCombination']['technologies'] == 1) style="color: red" @endif>
                technologies
            </button>
            <button name="pressed" value="sport" @if($context['rubricsCombination']['sport'] == 1) style="color: red" @endif>
                sport
            </button>
            <button name="pressed" value="other" @if($context['rubricsCombination']['other'] == 1) style="color: red" @endif>
                other
            </button>
            <button name="pressed" value="world" @if($context['rubricsCombination']['world'] == 1) style="color: red" @endif>
                world
            </button>
            <button name="pressed" value="local" @if($context['rubricsCombination']['local'] == 1) style="color: red" @endif>
                local
            </button>
        </form>
    @endif

    <!-- News -->
    @if(array_key_exists('articles', $context) and $context['articles'] != NULL)
        @foreach ($context['articles'] as $article)
            <details>
                <summary>
                    <b>{{ $article->header }}</b>
                </summary>

                <article>
                    {{ $article->body }}
                </article>
                <!-- author -->
                <address>
                    {{ $article->user->nickname }}
                </address>
                <!-- links -->
                @foreach ($article->links as $link)
                    <div>
                        <a href="{{ $link->link }}">{{ $link->link }}</a>
                    </div>
                @endforeach
            </details>
            @if(Auth::check() and Auth::user()->id == $article->user_id)
                <div>
                    Это Ваша статья
                </div>
            @endif
        @endforeach

        <!-- paginator -->
<!-- need to add "if" to check if paginator exists -->
        <div>{{ $context['articles']->links() }}</div>

    @endif
    
    <!-- debugging -->
    @if(array_key_exists('debugging', $context) and $context['debugging'] != NULL)
        <?php
            echo '<pre>';
            var_dump($context);
            echo '</pre>'
        ?>
    @endif
@endsection