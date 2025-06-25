@extends('admin-dashboard.layout.apps')
@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">{{Auth::user()->name}}</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                  <div class="row">
                       <div class="col">
                            @if(session('status'))
                                <div class="alert alert-info">
                                   {{ session('status') }}
                                </div>
                            @endif
                     </div>
               </div>
                <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
              </div>
            </div>
          </div>
         <div class="row">
            <div class="col mb-4">
              <a href="{{route('categories.create')}}">  <button class="btn btn-info btn-medium">Add Category</button></a>
            </div>
         </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Categories List</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                           <th>No:</th>
                          <th>Category Title</th>
                          <th>Action</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @foreach($category as $k => $cate)
                        <tr>
                          <td>{{$k+1}}</td>
                          <td class="font-weight-bold">{{$cate->name}}</td>
                          
                          
                          <td class="font-weight-medium">
                            <a href="{{ route('categories.show', $cate->id) }}" ><button class="btn btn-primary btn-sm"> Edit</button></a><br>&nbsp
                            
                            <form method="POST" action="{{route('categories.destroy',$cate->id)}}">
                              @csrf
                               @method('DELETE')
                                   <button type="submit" class="btn btn-danger  btn-sm">Drop</button>
                            </form>
                         
                        </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        
        <!-- content-wrapper ends -->
       @include('admin-dashboard.layout.footer')
      </div>
@endsection