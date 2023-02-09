@extends('layouts.app')

@section('title', 'Your Renting')

@section('content')
    <form action="{{ route('cart.calculate') }}" method="post">
        @csrf
        <table class="table text-muted align-middle bg-white border">
            <thead class="table-warning text-muted">
                <th></th>
                <th></th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>DAYS&PRICE</th>
                <th>START DAY</th>
                <th>RETURN DAY</th>
            </thead>
            <tbody>
                @forelse ($cartData as $cart)
                    </tr>
                    {{-- id --}}
                    <td>{{ $cart['post']->id }}</td>
                    {{-- image --}}
                    <td>
                        <a href="{{ route('post.show', $cart['post']->id) }}">
                            <img src="{{ asset('/storage/images/' . $cart['post']->image) }}" alt="{{ $cart['post']->image }}"
                                class="d-block mx-auto admin-posts-img">
                        </a>
                    </td>
                    {{-- name --}}
                    <td>{{ $cart['post']->name }}</td>
                    {{-- quantity --}}
                    <td>
                        {{ $cart['quantity'] }}
                        {{-- <select name="quantity[]" id="quantity">
                            <option hidden>Quantity</option>
                            @for ($i = $cart->posts->quantity; $i > 0; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select> --}}
                    </td>
                    {{-- day $ price --}}
                    <td>
                        {{ '$' . $cart['price'] }}
                        {{-- <select name="price[]" id="price">
                            <option hidden>Day & Price</option>
                            <option value="{{ $cart->posts->price_1 }}">3 days : ${{ $cart->posts->price_1 }}</option>
                            <option value="{{ $cart->posts->price_2 }}<">1 week : ${{ $cart->posts->price_2 }}</option>
                            <option value="{{ $cart->posts->price_3 }}">2 weeks : ${{ $cart->posts->price_3 }}</option>
                        </select> --}}
                    </td>
                    {{-- start date --}}
                    <td>
                        <input type="date" name="rental_start" id="start" class="form-control"
                            value="{{ $cart['rental_start'] }}">
                    </td>
                    {{-- return date --}}
                    <td>
                        <input type="date" name="return_date" id="return" class="form-control"
                            value="{{ date('Y-m-d', strtotime($cart['return_date'])) }}">
                    </td>
                    {{-- button --}}
                    {{-- <td>
                        <button class="btn btn-sm text-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-product-{{ $cart['post']->id }}">
                            <i class="fa-solid trash-can me-1"></i>
                        </button>
                        @include('users.cart.modal.status')
                    </td> --}}
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <div class="bg-warning mt-3 w-50">
            <p class="display-6">Your Total : ${{ $totalAmount }}</h4>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-calculator"></i> Checkout
        </button>
    </form>
@endsection
