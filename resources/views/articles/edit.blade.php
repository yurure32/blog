@extends('layouts.app')

@section('content')

    <h1>記事編集</h1>

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'put']) !!}
    
                <div class="form-group">
                {!! Form::label('title', 'タイトル(※最大30字まで)') !!}
                {!! Form::textarea('title', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                
                <div class="form-group">
                {!! Form::label('content', '本文(※最大1200字まで)') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '15']) !!}
                </div>
    
            {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
    
            {!! Form::close() !!}
        </div>
    </div>

@endsection