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
            @if (count($comments) > 0)
                <ul style="list-style: none;">
                    @foreach ($comments as $comment)
                        <div class="comment">
                            <?php $article = App\Article::find($comment->article_id); ?>
                            <h3 style="word-break: break-all">{{ $comment->content }}</h3>
                            <h4 style="word-break: break-all">{!! link_to_route('articles.show', $article->title, ['id' => $comment->article_id]) !!}</h4>
                        </div>
                    @endforeach
                </ul>
            @endif
            {!! $comments->render() !!}
        </div>
    </div>
@endsection