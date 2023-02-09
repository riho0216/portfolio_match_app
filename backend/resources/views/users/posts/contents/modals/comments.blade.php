<div class="mt-3">

    @if ($post->comments->isNotEmpty())
        <hr>
        <ul class="list-group">
            @foreach ($post->commnets->take(2) as $commnet)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="#" class="text-decoration-none text-dark fw-bold">
                        {{ $commnet->user->name }}
                    </a>
                    &nbsp;
                    <p class="d-inline fw-light">
                        {{ $comment->body }}
                    </p>
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <span class="text-uppercase text-muted xsmall">
                            {{ date('M d, Y', strtotime($comment->created_at)) }}
                        </span>
                        @if (Auth::user()->id === $comment->user->id)
                            &middot;
                            <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                        @endif
                    </form>
                </li>
            @endforeach
            @if ($post->comments->count() > 2)
                <li class="list-group-item border-0 px-0 pt-0">
                    <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none small">View All
                        {{ $post->comments->count() }} Comments</a>
                </li>
            @endif
        </ul>
    @endif

    <form action="{{ route('comment.store', $post_id) }}" method="post">
        @csrf
        <div class="input-group">
            <textarea name="comment_body{{ $post->id }}" rows="2" class="form-control form-control-sm"
                placeholder="Add your questions and comments...">{{ old('commnet_body' . $post->id) }}</textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
        @error('commnet_body' . $post->id)
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </form>
</div>
