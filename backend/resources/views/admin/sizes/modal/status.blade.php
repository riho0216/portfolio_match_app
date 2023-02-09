{{-- Deacticate Size --}}
<div class="modal fade" id="size-delete-{{ $size->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-trash-can me-1"></i>Deactivate Size
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span class="fw-bold">{{ $size->name }}</span> tag?
                <p>This action will affected all the post under this gender tag. Post without a size tag will fall
                    under Uncategorized.</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.size.destroy', $size->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edite Gender --}}
<div class="modal fade" id="size-edit-{{ $size->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-pen me-1"></i>Edit Size
                </h3>
            </div>
            <form action="{{ route('admin.size.update', $size->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <label for="size" class="form-label"></label>
                    <input name="size" id="size" class="form-control" value="{{ old('size', $size->name) }}">
                </div>

                <div class="modal-footer border-0">
                    <button class="btn btn-outline-warning btn-sm" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
