@extends('layouts.app')

@section('content')

    <h1 style="word-break: break-all;">タイトル:{{ $article->title }}</h1>
    
    <p style="word-break: break-all;">{!! nl2br(e($article->content)) !!}</p>
    
    <?php $user = $article->user; ?>
    
    <p>Username:{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</p>
    
    @if (\Auth::id() === $article->user_id)
        {!! link_to_route('articles.edit', '編集', ['id' => $article->id], ['class' => 'btn btn-success']) !!}
        
        {!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
    
    <h2>コメント</h2>
    
    <div>
        
        @if (count($comments) > 0)
                @include('comments.comments', ['comments' => $comments])
        @endif
        
        {!! Form::open(['route' => 'comments.store']) !!}
                              <div class="form-group">
                                  {!! Form::hidden('article_id', $article->id) !!}
                                  {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                                  {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-block']) !!}
                              </div>
        {!! Form::close() !!}
    
    </div>

@endsection