@extends('layouts.app')

@section('title', 'All Genders')

@section('content')
    <form action="{{ route('admin.gender.store') }}" method="post">
        <div class="row mb-3 gx-2">
            @csrf
            <div class="col-4">
                <input name="gender" id="gender" class="form-control" placeholder="Add a gender...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-md"><i
                        class="fa-solid fa-plus text-light me-1"></i>ADD</button>
            </div>
        </div>
    </form>
    <table class="table text-muted align-middle bg-white border">
        <thead class="table-success text-muted">
            <th>#</th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST UPDATED</th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($all_genders as $gender)
                <tr>
                    {{-- id --}}
                    <td>{{ $gender->id }}</td>
                    {{-- name --}}
                    <td>{{ $gender->name }}</td>
                    </td>
                    {{-- count --}}
                    <td>{{ $gender->genderPost->count() }}</td>
                    {{-- last updated --}}
                    <td>{{ $gender->updated_at }}</td>

                    {{-- button --}}
                    <td>
                        <button type="button" class="d-inline btn btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#gender-edit-{{ $gender->id }}">
                            <i class="fa-solid fa-pen">
                                <a href="{{ route('admin.gender.edit', $gender->id) }}"></a></i>
                        </button>
                        &nbsp;
                        <button type="button" class="d-inline btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#gender-delete-{{ $gender->id }}">
                            <i class="fa-solid fa-trash-can">
                                <a href="{{ route('admin.gender.destroy', $gender->id) }}"></a></i>
                        </button>
                        @include('admin.genders.modal.status')
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_genders->links() }}
    </div>
@endsection
