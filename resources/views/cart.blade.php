@extends('layouts.app')
@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart_items as $cart)
                    @php
                        $item_total = $cart->price * $cart->quantity;
                        $total += $item_total;
                    @endphp
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('uploads/images/' . $cart->product->image) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $cart->product->title }}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rs. {{ number_format($cart->price, 2) }}</p>
                        </td>
                        <td>
                            <form action="{{ route('update.cart', $cart->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="minus" class="btn btn-sm btn-outline-secondary" {{ $cart->quantity == 1 ? 'disabled' : '' }}>−</button>

                                <input type="text" name="quantity" value="{{ $cart->quantity }}" class="form-control text-center mx-2" style="width: 60px;" readonly>

                                <button type="submit" name="action" value="plus" class="btn btn-sm btn-outline-secondary">+</button>
                            </form>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rs. {{ number_format($item_total, 2) }}</p>
                        </td>
                        <td>
                            <!-- Optional: Delete button -->
                            <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Are you sure you want to remove this item?')">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Total Section -->
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div>

        <div class="row g-4 justify-content-end">
    <div class="col-8"></div>
    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
        <div class="bg-light rounded">
            <div class="p-4">
                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="mb-0 me-4">Subtotal: Rs. {{ number_format($total, 2) }}</h5>
                </div>

              
                <form action="{{route('checkout')}}" method="POST" class="text-center">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="text" name="full_name" class="form-control w-80" placeholder="Full Name" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3 d-flex justify-content-center">
                        <textarea name="address" class="form-control w-80" placeholder="Address" rows="3" required></textarea>
                    </div>
                     <!-- totalPhone Number -->
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="hidden" name="bill"  value="{{ $total }}"required>
                    </div>
                    <!-- Phone Number -->
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="text" name="phone" class="form-control w-80" placeholder="Phone" required>
                    </div>

                    <!-- Checkout Button -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
               

            </div>
        </div>
    </div>
</div>

<!-- Cart Page End -->

@endsection
