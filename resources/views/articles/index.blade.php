@extends('layouts.app')

@section('content')

    <h1>記事一覧</h1>
    
    @if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="article">
                <h2 class="article_title" style="word-break: break-all">{!! link_to_route('articles.show', $article->title, ['id' => $article->id]) !!}</h2>
                <h3 class="aticle_content" style="word-break: break-all">{{ str_limit($article->content, $limit = 150, $end = '...') }}</h3>
                <h4>{!! link_to_route('articles.show', "続きを読む", ['id' => $article->id]) !!}</h4>
            </div>
        @endforeach
    @endif
    {!! $articles->render() !!}
@endsection