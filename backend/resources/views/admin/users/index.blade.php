@extends('layouts.app')

@section('title', 'All Users')

@section('content')

    <table class="table text-muted align-middle bg-white border">
        <thead class="table-primary text-muted">

            <th></th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th></th>

        </thead>
        <tbody>
            @forelse ($all_user as $user)
                <tr>
                    {{-- id --}}
                    <td class="text-center">{{ $user->id }}</td>
                    {{-- name --}}
                    <td>
                        <a href="{{ route('profile.show', $user->id) }}"
                            class="text-decoration-none text-dark fw-bold">{{ $user->name }}
                        </a>
                    </td>
                    {{-- email --}}
                    <td>{{ $user->email }}</td>
                    {{-- created at --}}
                    <td>{{ $user->created_at }}</td>
                    {{-- status --}}
                    <td>
                        @if ($user->trashed())
                            <i class="fa-solid fa-circle-minus me-1 text-secondary"></i>Inactive
                        @else
                            <i class="fa-solid fa-circle me-1 text-success"></i>Active
                        @endif
                    </td>
                    {{-- button --}}
                    <td>
                        @if ($user->trashed())
                            <div class="drop-down">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item text-dark" data-bs-toggle="modal"
                                        data-bs-target="#activate-user-{{ $user->id }}">
                                        <i class="fa-solid fa-user me-1"></i>Activate
                                        {{ $user->name }}
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
                                        data-bs-target="#deactivate-user-{{ $user->id }}">
                                        <i class="fa-solid fa-user-slash me-1"></i>Deactivate
                                        {{ $user->id }}
                                    </button>
                                </div>
                            </div>
                        @endif
                        @include('admin.users.modal.status')
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_user->links() }}
    </div>
@endsection
