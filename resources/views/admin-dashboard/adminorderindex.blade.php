@extends('admin-dashboard.layout.apps')
@section('content')
        
       <div class="container mt-4">
    <h2>Orders List</h2>
   <table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Order Date</th>
            <th>Products</th>
            <th>Qty</th>
            <th>Total</th>
            <!-- <th>Payment</th> -->
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->fullname }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->created_at->format('d-m-Y') }}</td>
            <td>
                <!-- <ul>
                    @foreach($order->orderItems as $item)
                        <li>{{ $item->product->name ?? 'N/A' }} (x{{ $item->quantity }})</li>
                    @endforeach
                </ul> -->
                @foreach($order->orderItems as $item)
        @if($item->product && $item->product->image)
            <img src="{{ asset('uploads/images/' . $item->product->image) }}" width="60" height="60" style="margin: 5px;">
        @else
            <span>N/A</span>
        @endif
    @endforeach
            </td>
          @php
    $totalQuantity = 0;
    $totalAmount = 0;
@endphp

@foreach ($order->orderItems as $item)
    @php
        $totalQuantity += $item->quantity;
        $totalAmount += $item->price * $item->quantity;
    @endphp
@endforeach

<td>{{ $totalQuantity }}</td>
<td>Rs {{ number_format($totalAmount) }}</td>
<!-- <td>{{ $order->payment_method }}</td> -->
<td>{{ ($order->status) }}</td>

            <td>
                <a href="{{route('admin.orders.show',$order->id)}}">View</a>
                <a href="{{route('admin.orders.delete',$order->id)}}">Drop</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

       @include('admin-dashboard.layout.footer')
</div>


            </div>
            

 @endsection
 @push('script')


 @endpush
    
   