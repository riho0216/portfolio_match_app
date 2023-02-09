<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="w-100">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            <div class="mb-2 badge bg-secondary">
                {{ $post->genderPost->gender->name }}
            </div>
        </div>
        <div class="col p-0">
            <div class="mb-2 badge bg-secondary">
                {{ $post->sizePost->size->name }}
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-auto mb-2">
            <label for="quantity">Quantity : {{ $post->quantity }}</label>
        </div>
        <div class="col mb-2">
            <label for="price_1">3 days~ : ${{ $post->price_1 }}</label>
        </div>
    </div>

    {{-- checking if the user own the post --}}
    @if (Auth::user()->id === $post->user->id)
        <div class="row align-items-center">
            <div class="col">
                <a href="{{ route('post.edit', $post->id) }}"
                    class="btn btn-outline-primary btn-sm text-decoration-none">
                    <i class="fa-regular fa-pen-to-square me-1"></i>Edit
                </a>
            </div>
            <div class="col">
                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#delete-post{{ $post->id }}">
                    <i class="fa-regular fa-trash-can me-1"></i>Delete
                </button>
            </div>
        </div>
        {{-- include modal --}}
        @include('users.posts.contents.modals.delete')
    @else
        <div class="row">
            <div class="col">
                <form action="{{ route('cart.store', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-warning btn-sm">
                        <i class="fa-solid fa-cart-arrow-down me-1"></i>Rental
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
