@extends('layouts.app')

@section('title', 'Show Post')

@section('content')

    <div class="row justify-content-center">
        <div class="col-8 p-0 border-end">
            <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="cover">
        </div>
        <div class="col-4 p-0 bg-white">
            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('profile.show', $post->user->id) }}">
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            </a>
                        </div>
                        <div class="col ps-0">
                            <h6><a href="{{ route('profile.show', $post->user->id) }}"
                                    class="text-decoration-none text-dark">{{ $post->user->name }}</a></h6>
                        </div>
                        <div class="col ps-0">
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-1">
                        <h4 class="diaplay-5">
                            <a href="#"class="text-decoration-none text-dark">{{ $post->name }}</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="mb-3">
                                {{ $post->genderPost->gender->name }}
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="mb-3">
                                {{ $post->sizePost->size->name }}
                            </div>
                        </div>
                    </div>

                    <div class="fw-bold mb-3">
                        <label for="quantity">Quantity</label>
                        <p>{{ $post->quantity }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="price_1">3 days</label>
                        <p>{{ $post->price_1 }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="price_2">1 week</label>
                        <p>{{ $post->price_2 }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="price_3">2 weeks</label>
                        <p>{{ $post->price_3 }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <p>{{ $post->description }}</p>
                    </div>

                    {{-- comments later --}}
                    {{-- @include('users.posts.contents.comments') --}}
                    <div class="mt-3">

                        @if ($post->comments->isNotEmpty())
                            <hr>
                            <ul class="list-group">
                                @foreach ($post->comments->take(2) as $commnet)
                                    <li class="list-group-item border-0 p-0 mb-2">
                                        <a href="#" class="text-decoration-none text-dark fw-bold">
                                            {{ $comment->user->id }}
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
                                                <button type="submit"
                                                    class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                                            @endif
                                        </form>
                                    </li>
                                @endforeach
                                @if ($post->comments->count() > 2)
                                    <li class="list-group-item border-0 px-0 pt-0">
                                        <a href="{{ route('post.show', $post->id) }}"
                                            class="text-decoration-none small">View All
                                            {{ $post->comments->count() }} Comments</a>
                                    </li>
                                @endif
                            </ul>
                        @endif

                        <form action="{{ route('comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="input-group">
                                <textarea name="comment_body{{ $post->id }}" rows="2" class="form-control form-control-sm"
                                    placeholder="Add your questions and comments...">{{ old('comment_body' . $post->id) }}</textarea>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
                            </div>
                            @error('comment_body' . $post->id)
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
