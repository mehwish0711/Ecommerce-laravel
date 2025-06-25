@extends('admin-dashboard.layout.apps')
@section('content')
<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          
           
           
           
           
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users Information</h4>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                         Name
                          </th>
                          <th>
                           Email
                          </th>
                        
                          <th>
                          ROLE
                          </th> <th>
                        ACTION
                          </th>

                        </tr>
                      </thead>
                      
                      <tbody>
                        @foreach($users as $key => $user)
                        <tr class="table-info">
                          <td>
                             {{$key+1}}
                          </td>
                          <td>
                            {{$user->name}}
                          </td>
                          <td>
                            {{$user->email}}
                          </td>
                          <td>
                             {{$user->role}}
                          </td>
                          <td>
                            <a href="" ><button class="btn btn-primary" >Edit</button></a>
                             <a href="" ><button  class="btn btn-danger">Delete</button></a>
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
        </div>
     
      <!-- main-panel ends -->
       @include('admin-dashboard.layout.footer')
      </div>
@endsection