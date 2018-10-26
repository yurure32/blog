@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            @if (Auth::check())
                <?php $user = Auth::user(); ?>
                {{ $user->name }}
            @else
                <div class="center jumbotron">
                    <div class="text-center">
                        <h1>Welcome to the Blog.</h1>
                        {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection