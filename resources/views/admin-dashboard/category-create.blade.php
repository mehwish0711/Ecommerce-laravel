@extends('admin-dashboard.layout.apps')
@section('content')
  <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4>
                
                  <form class="forms-sample"method="POST"action="{{route('categories.store')}}" enctype="multipart/form-data">
                    @csrf
                 
                   
                    <div class="form-group">
                      <label for="exampleInputPassword4">Name Of Category</label>
                      <input type="text" name="category" class="form-control" id="exampleInputPassword4" placeholder="category name">
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

    
   