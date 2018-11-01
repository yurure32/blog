@extends('layouts.app')

@section('content')

    <h1>記事一覧</h1>
    
    @if (count($articles) > 0)
        <ul>
            @foreach ($articles as $article)
                <li>{!! link_to_route('articles.show', $article->title, ['id' => $article->id]) !!} : {{ $article->content }}</li>
            @endforeach
        </ul>
    @endif
    
@endsection