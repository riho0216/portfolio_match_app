@extends('layouts.app')

@section('title', 'All Sizes')

@section('content')
    <form action="{{ route('admin.size.store') }}" method="post">
        <div class="row mb-3 gx-2">
            @csrf
            <div class="col-4">
                <input name="size" id="size" class="form-control" placeholder="Add a size...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-md"><i
                        class="fa-solid fa-plus text-light me-1"></i>ADD</button>
            </div>
        </div>
    </form>
    <table class="table text-muted align-middle bg-white border">
        <thead class="table-danger text-muted">
            <th>#</th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST UPDATED</th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($all_sizes as $size)
                <tr>
                    {{-- id --}}
                    <td>{{ $size->id }}</td>
                    {{-- name --}}
                    <td>{{ $size->name }}</td>
                    </td>
                    {{-- count --}}
                    <td>{{ $size->sizePost->count() }}</td>
                    {{-- last updated --}}
                    <td>{{ $size->updated_at }}</td>

                    {{-- button --}}
                    <td>
                        <button type="button" class="d-inline btn btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#size-edit-{{ $size->id }}">
                            <i class="fa-solid fa-pen">
                                <a href="{{ route('admin.size.edit', $size->id) }}"></a></i>
                        </button>
                        &nbsp;
                        <button type="button" class="d-inline btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#size-delete-{{ $size->id }}">
                            <i class="fa-solid fa-trash-can">
                                <a href="{{ route('admin.size.destroy', $size->id) }}"></a></i>
                        </button>
                        @include('admin.sizes.modal.status')
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_sizes->links() }}
    </div>
@endsection
