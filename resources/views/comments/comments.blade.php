<ul class="media-list">
@foreach ($comments as $comment)
    <?php $user = $comment->user; ?>
    <li class="media">
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
            </div>
            <div>
                <p style="word-break: break-all;">{!! nl2br(e($comment->content)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $comment->user_id)
                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $comments->render() !!}