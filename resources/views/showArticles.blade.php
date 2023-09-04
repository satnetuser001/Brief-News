@extends('layouts.basic')

<!-- Title Page in case -->
@if(array_key_exists('pageName', $context))
    @section('title', $context['pageName'])
@else
    @section('title', 'Page Has No Title')
@endif

@section('content')
    <div class="showArticles">
        <!-- Name Page in case -->
        <div class="namePage">
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
            <!-- articles -->
            <div class="articles">
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

                    <!-- edit article button -->
                    @if(
                        $article['deleted_at'] == NULL and
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

                    <!-- delete article button -->
                    @if(
                        $article['deleted_at'] == NULL and
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

                    <!-- restore article button -->
                    @if($article['deleted_at'] != NULL)
                        <form action="{{ route('articles.restore', [$article->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="submit" value="Восстановить статью">
                        </form>
                    @endif
                @endforeach
            </div>

            <!-- paginator -->
            <!-- need to add "if" to check if paginator method exists in object -->
            <div class="paginator">
                {{ $context['articles']->links() }}
            </div>

        @endif
    </div>
@endsection