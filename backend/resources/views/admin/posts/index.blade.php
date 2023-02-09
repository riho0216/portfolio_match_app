@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <table class="table text-muted align-middle bg-white border">
        <thead class="table-warning text-muted">
            <th></th>
            <th></th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>LIKED</th>
            <th>GENDER</th>
            <th>SIZE</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th></th>
        </thead>
        <tbody>
            {{-- {{ dd($all_posts) }} --}}
            @forelse ($all_posts as $post)
                <tr>
                    {{-- id --}}
                    <td>{{ $post->id }}</td>
                    {{-- image --}}
                    <td>
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}"
                                class="d-block mx-auto admin-posts-img">
                        </a>
                    </td>
                    {{-- name --}}
                    <td>{{ $post->name }}</td>
                    {{-- quantity --}}
                    <td>{{ $post->likes->count() }}</td>
                    {{-- likes --}}
                    <td>{{ $post->quantity }}</td>
                    {{-- gender --}}
                    <td>
                        @if ($post->genderPost->gender->name)
                            <span class="badge bg-secondary bg-opacity-50">
                                {{ $post->genderPost->gender->name }}
                            </span>
                        @else
                            <div class="badge bg-dark text-wrap">Uncategorized</div>
                        @endif
                    </td>
                    {{-- size --}}
                    <td>
                        @if ($post->sizePost->size->name)
                            <span class="badge bg-secondary bg-opacity-50">
                                {{ $post->sizePost->size->name }}
                            </span>
                        @else
                            <div class="badge bg-dark text-wrap">Uncategorized</div>
                        @endif
                    </td>
                    {{-- created at --}}
                    <td>{{ $post->created_at }}</td>
                    {{-- status --}}
                    <td>
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle-minus me-1 text-secondary"></i>Hidden
                        @else
                            <i class="fa-solid fa-circle me-1 text-success"></i>Visible
                        @endif
                    </td>
                    {{-- button --}}
                    <td>
                        @if ($post->trashed())
                            <div class="drop-down">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item text-dark" data-bs-toggle="modal"
                                        data-bs-target="#unhide-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye me-1"></i>Unhide post
                                        {{ $post->id }}
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="drop-down">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item text-dark" data-bs-toggle="modal"
                                        data-bs-target="#hide-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash me-1"></i>Hide post
                                        {{ $post->id }}
                                    </button>
                                </div>
                            </div>
                        @endif
                        @include('admin.posts.modal.status')
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_posts->links() }}
    </div>
@endsection
