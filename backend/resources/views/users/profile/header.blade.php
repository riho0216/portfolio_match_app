<div class="row">
    <div class="col-4 mb-2">
        @if ($user->avatar)
            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}"
                class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
        @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">{{ $user->name }}</h2>
            </div>
            <div class="col-auto ps-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm-fw-bold">Edit
                        Profile</a>
                @endif
            </div>
        </div>
        @if ($user->role_id == 1)
            <a href="{{ route('profile.show', $user->id) }}"
                class="text-decoration-none text-dark"><strong>{{ $user->posts->count() }}</strong> posts
            </a>
        @elseif($user->role_id == 2)
            <a href="{{ route('profile.show', $user->id) }}"
                class="text-decoration-none text-dark"><strong>{{ $user->likes->count() }}</strong> likes
            </a>
        @endif
        <p class="fw-bold">{{ $user->introduction }}</p>
    </div>
</div>
