@extends('layouts.basic')

<!-- Title Page in case -->
@if(array_key_exists('pageName', $context))
    @section('title', $context['pageName'])
@else
    @section('title', 'Page Has No Title')
@endif

@section('content')
    <div class="showArticlesPage">
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

        <!-- articles section -->
        @if(array_key_exists('articles', $context) and $context['articles'] != NULL)
            <div class="articles">
                @foreach ($context['articles'] as $article)
                    <div class="article">

                        <!-- article header -->
                        <input type="checkbox" class="toggleInput" id="toggleBody{{ $loop->index }}">
                        <label for="toggleBody{{ $loop->index }}" class="articleHeader">
                            <div class="articleCreationDate">{{ $article->created_at }}</div>
                            <div class="articleName">
                                <b>{{ $article->header }}</b>
                            </div>
                        </label>
                        
                        <!-- article body -->
                        <div class="articleBody">
                            <article>{{ $article->body }}</article>

                            <!-- links -->
                            @if($article->links->isNotEmpty())
                                <div>
                                    <br>
                                    <b>Ссылки на источники:</b>
                                    @foreach ($article->links as $objLink)
                                        <div>
                                            <a href="{{ $objLink->link }}">{{ $objLink->link }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- article footer -->
                        <div class="articleFooter">

                            <!-- article functional buttons -->
                            <div class="functionalButtons">

                                <!-- edit -->
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
                                        <a
                                            href="{{ route('articles.edit', [$article->id]) }}"
                                            class="button" 
                                        >
                                            Редактировать
                                        </a>
                                    </div>
                                @endif

                            
                                <!-- delete -->
                                @if(
                                    $article['deleted_at'] == NULL and
                                    Auth::check() and 
                                    (
                                        Auth::user()->role == "root" or
                                        Auth::user()->role == "admin"
                                    )
                                )
                                    <div>
                                        <a
                                            href="{{ route('articles.destroyConfirm', [$article->id]) }}"
                                            class="button" 
                                        >
                                            Удалить
                                        </a>
                                    </div>
                                @endif

                                <!-- restore -->
                                @if($article['deleted_at'] != NULL)
                                    <form action="{{ route('articles.restore', [$article->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input
                                            type="submit"
                                            class="button htmlButtonStyleCorrection"
                                            value="Восстановить статью"
                                        >
                                    </form>
                                @endif
                            </div>

                            <!-- article visualization buttons -->
                            <div class="visualizationButtons">

                                <!-- hide -->
                                <label
                                    for="toggleBody{{ $loop->index }}"
                                    class="hideArticleButton button pointer"
                                >
                                    Свернуть
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- paginator -->
        <!-- need to add "if" to check if paginator method exists in object -->
        <div class="paginator">
            {{ $context['articles']->links() }}
        </div>
    </div>
@endsection