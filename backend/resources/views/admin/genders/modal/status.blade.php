{{-- Deacticate Gender --}}
<div class="modal fade" id="gender-delete-{{ $gender->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-trash-can me-1"></i>Deactivate Gender
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span class="fw-bold">{{ $gender->name }}</span> tag?
                <p>This action will affected all the post under this gender tag. Post without a gender tag will fall
                    under Uncategorized.</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.gender.destroy', $gender->id) }}" method="post">
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
<div class="modal fade" id="gender-edit-{{ $gender->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-pen me-1"></i>Edit Gender
                </h3>
            </div>
            <form action="{{ route('admin.gender.update', $gender->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <label for="gender" class="form-label"></label>
                    <input name="gender" id="gender" class="form-control"
                        value="{{ old('gender', $gender->name) }}">
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
