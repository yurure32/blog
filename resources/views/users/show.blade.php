@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h2>ユーザー詳細</h2>
            <h3>username:{{ $user->name }}</h3>
            <ul class="nav nav-tabs nav-justfied">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">記事 <span class="badge">{{ $count_articles }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/comments') ? 'active' : '' }}"><a href="{{ route('users.comments', ['id' => $user->id]) }}">コメント <span class="badge">{{ $count_comments }}</span></a></li>
            </ul>
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                    <div class="article">
                    <h4 class="article_title" style="word-break: break-all">{!! link_to_route('articles.show', $article->title, ['id' => $article->id]) !!}</h4>
                    <h5 class="aticle_content" style="word-break: break-all">{{ str_limit($article->content, $limit = 150, $end = '...') }}</h5>
                    <h5>{!! link_to_route('articles.show', "続きを読む", ['id' => $article->id]) !!}</h5>
                    </div>
                @endforeach
            @endif
            {!! $articles->render() !!}
        </div>
    </div>
@endsection