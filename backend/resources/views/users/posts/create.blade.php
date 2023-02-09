@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-8">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" name="image" id="image" class="form-control" aria-describedby="image">
                <div class="form-text" id="image-info">
                    Acceptable formats:jpeg, jpg, png, and gif only
                    Maximum file size is 1048kb
                </div>
                @error('image')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product</label>
                    <input type="name" name="name" id="name" class="form-control">
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label fw-bold">Gender</label>
                    <br>
                    @foreach ($all_genders as $gender)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="{{ $gender->id }}" class="form-check-input" name="gender[]"
                                id="{{ $gender->name }}">
                            <label for="{{ $gender->name }}" class="form-label">{{ $gender->name }}</label>
                        </div>
                    @endforeach
                    @error('gender')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label fw-bold">Size</label>
                    <br>
                    @foreach ($all_sizes as $size)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="{{ $size->id }}" class="form-check-input" name="size[]"
                                id="{{ $size->name }}">
                            <label for="{{ $size->name }}" class="form-label">{{ $size->name }}</label>
                        </div>
                    @endforeach
                    @error('size')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                    @error('quantity')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price_1" class="form-label fw-bold">3 Days / $</label>
                    <input type="text" name="price_1" id="price_1" class="form-control">
                    @error('price_1')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price_2" class="form-label fw-bold">1 week / $</label>
                    <input type="text" name="price_2" id="price_2" class="form-control">
                    @error('price_2')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price_3" class="form-label fw-bold">2 week / $</label>
                    <input type="text" name="price_3" id="price_3" class="form-control">
                    @error('price_3')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control"
                    placeholder="Describe your product in detail">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md fw-bold">Post</button>
    </form>

@endsection
