@extends('layouts.app')
@section('content')

 <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Popularity</option>
                                        <option value="opel">Organic</option>
                                        <option value="audi">Fantastic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach($category as $cate)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="javascript:void(0)" class="cate_link" data-cate_id="{{ $cate->id }}"><i class="fas fa-apple-alt me-2"></i>{{$cate->name}}</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                             @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- oninput="amount.value=rangeInput.value" -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="50000" value="0" >
                                            <output id="amount" name="amount" min-velue="0" max-value="50000" for="rangeInput">0</output>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Sub Categories</h4>
                                            @foreach($subcategory as $sub_cate)
                                            <div class="mb-2">
                                           
                                                        <a href="#" class="sub-link" data-sub_link="{{ $sub_cate->id }}"><i class="me-2"></i>{{$sub_cate->name}}</a>
                                                        <!-- <span>(3)</span> -->
                                                   
                                            </div>
                                           
                                            @endforeach
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center shop_product_div">
                                  @include('shop2_products')
                                  
                                 
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
         @push('scripts')
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

         <script>
    
$(document).on('click', '.sub-link', function(e) {
    e.preventDefault();
    var sub_link = $(this).data('sub_link');
    // alert('your id is ' + sub_link);
         $.ajax({
        url: "{{ url()->current() }}",
        type: 'GET',
        data: { sub_link: sub_link },
        success: function(response) {
            $('.shop_product_div').html(response.viewshop); 
        },
        error: function(xhr) {
            console.log("AJAX Error:", xhr.responseText);
        }
    });
});

//Category filter
$(document).on('click','.cate_link',function(){
  var cate_link = $(this).data('cate_id');
//   alert('your id is' + cate);
  $.ajax({
    url:"{{url()->current()}}",
    type:'GET',
    data:{cate_link:cate_link},
    success:function(response){
        $('.shop_product_div').html(response.viewshop);

    },
  });

});
         

    // function getallproducts(){
//     $.ajax({
//         url: "{{ url()->current()}}",
//         type: 'GET',
//         success: function(response){
//             $('.shop_product').html(response);
//         }  
//     });
// }
   $(document).ready(function () {
        // Price slider move hote waqt value show karna
        $('#rangeInput').on('input', function () {
            $('#amount').text($(this).val());
        });
        $('#rangeInput').on('change', function () {
    var price = $(this).val();

    $.ajax({
        url: "{{ url()->current() }}",
        type: 'GET',
        data: { price: price },
        success: function (response) {
            $('.shop_product_div').html(response.viewshop);
        },
        error: function (xhr) {
            console.log("AJAX Error:", xhr.responseText);
        }
    });
});
    });
</script>
@endpush



    

