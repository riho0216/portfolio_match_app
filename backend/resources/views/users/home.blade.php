@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row gx-5">
            <div class="col-9">
                <div class="row">
                    <!-- POST COLUM-->
                    @forelse ($home_posts as $post)
                        <div class="col-4">
                            <div class="card mb-4">
                                {{-- title --}}
                                @include('users.posts.contents.title')
                                {{-- body --}}
                                @include('users.posts.contents.body')
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h2>Please wait for updating...</h2>
                            <p class="text-muted">Winter season is coming! Enjoy your trip in Japan!</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-3">
                <!-- Profile & Suggestions COLUM-->
                <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
                    <div class="col-auto">
                        <a href="{{ route('profile.show', Auth::user()->id) }}">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}"
                                    alt="{{ Auth::user()->avatar }}" class="rounded-circle avatar-md">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col ps-0">
                        <a href="{{ route('profile.show', Auth::user()->id) }}"
                            class="text-decoration-none text-dark fw-bold">
                            {{ Auth::user()->name }}
                        </a>
                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
