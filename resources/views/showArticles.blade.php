@extends('layouts.basic')

<!-- Title Page in case -->
@if(array_key_exists('pageName', $context))
    @section('title', $context['pageName'])
@else
    @section('title', 'Page Has No Title')
@endif

@section('content')
    <!-- Name Page in case -->
    <div>
        <b>
            @if(array_key_exists('pageName', $context))
                {{ $context['pageName'] }}
            @else
                Page Has No Name
            @endif
        </b>
    </div>

    <!-- Panel for sorting articles by rubrics and locale -->
    @include('includes.rubricsAndLocalePanel')

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
                @foreach ($article->links as $objLink)
                    <div>
                        <a href="{{ $objLink->link }}">{{ $objLink->link }}</a>
                    </div>
                @endforeach
            </details>
            @if(
                Auth::check() and 
                (
                    Auth::user()->id == $article->user_id or
                    Auth::user()->role == "root" or
                    Auth::user()->role == "admin"
                )
            )
                <div>
                    <a href="{{ route('articles.edit', [$article->id]) }}">Редактировать</a>
                </div>
            @endif
            @if(
                Auth::check() and 
                (
                    Auth::user()->role == "root" or
                    Auth::user()->role == "admin"
                )
            )
                <div>
                     <a href="{{ route('articles.destroyConfirm', [$article->id]) }}">Удалить</a>
                </div>
            @endif
        @endforeach

        <!-- paginator -->
        <!-- need to add "if" to check if paginator method exists in object -->
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