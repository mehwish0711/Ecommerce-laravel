  
     @if(session('status'))
    <div class="alert alert-warning">
        {{session('status')}}
    </div>
    @endif
  @if(count($products) > 0)
  @foreach($products as $product)
   <div class="col-md-6 col-lg-4 col-xl-3">
 
       <div class="rounded position-relative fruite-item">
           <div class="fruite-img">
               <img src="{{asset('uploads/images/'.$product->image)}}" class="img-fluid w-100 rounded-top" alt="" style="height:300;">
           </div>
           <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->subcategory->name}}</div>
           <div class="p-4 border border-secondary border-top-0 rounded-bottom">
               <h4>{{$product->title}}</h4>
               <p>{{$product->description}}</p>
               <div class="d-flex justify-content-between flex-lg-wrap">
                   <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}}</p>
                   <form action="{{ route('add.cart', $product->id) }}" method="POST" style="display:inline;" >
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="price" value="{{ $product->discount_price ?? $product->price }}">
    <input type="hidden" name="quantity" value="1"> {{-- Default quantity 1 --}}
    
   <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
     <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
</button>
</form></div>
           </div>

       </div>
   </div>
   @endforeach
   @else
   <div class="alert alert-warning">
           <strong>No product found</strong>
   </div>
   @endif