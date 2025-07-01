@extends('admin-dashboard.layout.apps') {{-- Aapka admin layout --}}
@section('content')

@section('content')

@php
    $total = 0;
@endphp
<div class="container mt-5">
    <h2 class="mb-4">Order #{{ $orderview->id }} Details</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5>Customer Info</h5>
            <p><strong>Name:</strong> {{ $orderview->fullname }}</p>
            <p><strong>Email:</strong> {{ $orderview->frontenduser->email }}</p>
            <p><strong>Phone:</strong> {{ $orderview->phone }}</p>
            <p><strong>Address:</strong> {{ $orderview->address }}</p>
        </div>
    </div>

    <h4>Ordered Items</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderview->orderItems as $index => $item)
                  @php
        $subtotal = $item->price * $item->quantity;
        $total += $subtotal;
    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->product->title ?? 'N/A' }}</td>
                        <td>
    @if($item->product->image)
        <img src="{{ asset('uploads/images/' . $item->product->image) }}" width="150" height="150" alt="Product Image">
    @else
        N/A
    @endif
</td>

                        <td>Rs. {{ number_format($item->price) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rs. {{ number_format($item->price * $item->quantity) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-end mt-3">
         <div class="text-end mt-3">
         <h5><strong>Total Amount:</strong> Rs.{{ number_format($total) }}</h5>    </div> </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
