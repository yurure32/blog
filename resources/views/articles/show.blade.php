@extends('layouts.app')

@section('content')

    <h1>タイトル:{{ $article->title }}</h1>

    <p>{{ $article->content }}</p>
    
    <?php $user = $article->user; ?>
    
    <p>Username:{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</p>
    
    @if (\Auth::id() === $article->user_id)
        {!! link_to_route('articles.edit', '編集', ['id' => $article->id], ['class' => 'btn btn-success']) !!}
        
        {!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif

@endsection