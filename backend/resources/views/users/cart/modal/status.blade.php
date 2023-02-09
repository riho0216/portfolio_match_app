{{-- Delete Product --}}
<div class="modal fade" id="delete-product-{{ $cart->post_id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid trash-can me-1"></i>Remove Product
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this product?
                <img src="{{ asset('/storage/images/' . $cart->posts->image) }}" alt="{{ $cart->posts->image }}"
                    class="d-block mt-2 admin-posts-img">
                <p>{{ $cart->posts->description }}</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('cart.destroy', $cart->post_id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>
