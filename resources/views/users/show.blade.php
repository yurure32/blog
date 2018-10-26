@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>ユーザー詳細</h2>
        <h3>username:{{ $user->name }}</h3>
        <ul class="nav nav-tabs nav-justfied">
            <li><a href="#">記事</a></li>
            <li><a href="#">コメント</a></li>
        </ul>
    </div>
@endsection