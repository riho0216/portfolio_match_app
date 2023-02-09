@extends('layouts.app')

@section('title', 'Your Renting')

@section('content')
    <form action="{{ route('cart.calculate') }}" method="get">
        @csrf
        <table class="table text-muted align-middle bg-white border">
            <thead class="table-warning text-muted">
                <th></th>
                <th></th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>DAYS&PRICE</th>
                <th>START DAY</th>
                <th></th>
            </thead>
            <tbody>
                @forelse ($user->carts as $cart)
                    </tr>
                    {{-- id --}}
                    <td>
                        <input type="hidden" name="post_id[]" value="{{ $cart->post_id }}">
                        {{ $cart->post_id }}
                    </td>
                    {{-- image --}}
                    <td>
                        <a href="{{ route('post.show', $cart->post_id) }}">
                            <img src="{{ asset('/storage/images/' . $cart->posts->image) }}" alt="{{ $cart->posts->image }}"
                                class="d-block mx-auto admin-posts-img">
                        </a>
                    </td>
                    {{-- name --}}
                    <td>{{ $cart->posts->name }}</td>
                    {{-- quantity --}}
                    <td>
                        <select name="quantity[]" id="quantity">
                            <option hidden>Quantity</option>
                            @for ($i = $cart->posts->quantity; $i > 0; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    {{-- day & price --}}
                    <td>
                        <select name="price[]" id="price">
                            <option hidden>Day & Price</option>
                            <option value="{{ $cart->posts->price_1 }}">3 days : ${{ $cart->posts->price_1 }}</option>
                            <option value="{{ $cart->posts->price_2 }}">1 week : ${{ $cart->posts->price_2 }}</option>
                            <option value="{{ $cart->posts->price_3 }}">2 weeks : ${{ $cart->posts->price_3 }}</option>
                        </select>
                    </td>
                    {{-- start date --}}
                    <td>
                        <input type="date" name="rental_start" id="start" class="form-control"
                            value="{{ date('Y-m-d', strtotime(now())) }}">
                    </td>
                    {{-- button --}}
                    <td>
                        <button class="btn btn-sm text-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-product-{{ $cart->post_id }}">
                            <i class="fa-solid trash-can me-1"></i>
                        </button>
                        @include('users.cart.modal.status')
                    </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        <button type="submit" class="btn btn-warning">
            <i class="fa-solid fa-calculator"></i> Calcuate
        </button>
    </form>

    {{-- <div class="d-flex justify-content-center">
        {{ $all_posts->links() }}
    </div> --}}
@endsection
