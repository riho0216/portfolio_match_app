{{-- Hide Post --}}
<div class="modal fade" id="hide-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-eye-slash me-1"></i>Hide Post
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to hide this post?
                <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}"
                    class="d-block mt-3 admin-posts-img">
                <p>{{ $post->name }}</p>
                <p>{{ $post->description }}</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.posts.hidepost', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm"> Hide Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Unhide Post --}}
<div class="modal fade" id="unhide-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-eye me-1"></i>Unhide Post
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to unhide this post?
                <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}"
                    class="d-block mt-3 admin-posts-img">
                <p>{{ $post->name }}</p>
                <p>{{ $post->description }}</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.posts.unhidepost', $post->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-outline-success btn-sm" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm"> Unhide Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
