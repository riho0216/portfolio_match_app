@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('users.profile.header')

    <div class="row">
        @if ($user->role_id == 1)
            @forelse ($user->posts as $post)
                <div class="col-4">
                    <div class="card mb-4">
                        {{-- title --}}
                        @include('users.posts.contents.title')
                        {{-- body --}}
                        @include('users.posts.contents.body')
                    </div>
                </div>
            @empty
                <h3 class="texrt-muted text-center">No Post Yet</h3>
            @endforelse
        @elseif ($user->role_id == 2)
            @forelse ($user->likes as $like)
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span class="fw-bold">{{ $like->posts->name }}</span>
                                </div>
                                <div class="col-auto px-0">
                                    <span>{{ $like->posts->likes->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    @if ($like->posts->isLiked())
                                        <form action="{{ route('like.destroy', $like->posts->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn shadows-none p-0">
                                                <i class="fa-solid fa-heart text-danger"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('like.store', $like->posts->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn shadows-none p-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('/storage/images/' . $like->posts->image) }}" alt="{{ $like->posts->image }}"
                            class="w-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        {{ $like->posts->genderPost->gender->name }}
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="mb-3">
                                        {{ $like->posts->sizePost->size->name }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="price_1">3 days~ : ${{ $like->posts->price_1 }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="texrt-muted text-center">No Likes Yet</h3>
            @endforelse
        @endif
    </div>
@endsection
