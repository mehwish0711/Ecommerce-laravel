@extends('admin-dashboard.layout.apps')
@section('content')
  <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                  <p class="card-description">
                    Product Detail
                  </p>
                  <form class="forms-sample"method="POST"action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text"name="title" class="form-control" id="exampleInputName1" placeholder="Title">
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword4">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputPassword4" placeholder="Price">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword4">Discount_Price</label>
                      <input type="number" name="discount_price"class="form-control" id="exampleInputPassword4" placeholder="Price">
                    </div>
                    <div class="form-group">
                      
                      <label for="exampleSelectGender">Category</label>
                      
                        <select class="form-control" id="exampleSelectGender"name="parent_category">
                          @foreach($category as $cate)
                          <option value="{{ $cate -> id }}">{{ $cate->name }}</option>
                           @endforeach
                        </select>
                       
                      </div>
                        <div class="form-group">
                      <label for="exampleSelectGender">Sub_Category</label>
                     
                        <select class="form-control" id="exampleSelectGender"name="sub_category">
                           @foreach($subcategory as $sub)
                          <option value="{{$sub->id}}"class="sub_cat_options"data-sub_category="{{$sub->category_id}}"style="">{{$sub->name}}</option>
                           @endforeach
                        </select>
                      
                      </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="">
                      <!-- <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div> -->
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="exampleTextarea1" name="description"rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
             </div>
              </div>
               @include('admin-dashboard.layout.footer')
            </div>

 @endsection
 @push('script')
<script>
  $('select[name="parent_category"]').change(function(){
     var p_cate = $(this).val();
    $('.sub_cat_options').hide();
    $('.sub_cat_options[data-sub_category = ' + p_cate + ']').show();
  });
  // $('select[name="parent_category"]').change(function(){
//     var p_cate = $(this).val();
//     $('.sub_cat_options').hide();
//     $('.sub_cat_options[data-sub_category="' + p_cate + '"]').show();
// });

  </script>

 @endpush
    
   