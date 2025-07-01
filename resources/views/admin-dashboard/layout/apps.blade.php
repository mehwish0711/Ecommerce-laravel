<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin-panel/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin-panel/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin-panel/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin-panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('admin-panel/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin-panel/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin-panel/images/favicon.png')}}" />
</head>
<body>
 @include('admin-dashboard.layout.navbar')
    <div class="container-fluid page-body-wrapper">
    
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">{{env('APP_NAME')}}</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" >
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title ">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('users')}}">Users List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add-products')}}">Add User</a></li>
       
              </ul>
            </div>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('product')}}">Products List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add-products')}}">Add Product</a></li>
               </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basics">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basics">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('categories.index')}}">Category List</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Add Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="">Add Sub Category</a></li>
        
              </ul>
            </div>
            
          </li>
            <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Track Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders.index')}}">Orders List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add-products')}}">Order Items</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add-products')}}">Customers</a></li>
               </ul>
            </div>
          </li>
          
         
      
        </ul>
        
      </nav>
      <!-- partial -->
     @yield('content')
      <!-- main-panel ends -->
    </div> 
 
    <!-- page-body-wrapper ends -->
     
  </div>
       
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('admin-panel/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin-panel/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin-panel/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin-panel/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('admin-panel/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin-panel/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin-panel/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin-panel/js/template.js')}}"></script>
  <script src="{{asset('admin-panel/js/settings.js')}}"></script>
  <script src="{{asset('admin-panel/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin-panel/js/dashboard.js')}}"></script>
  <script src="{{asset('admin-panel/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
   @stack('script')
</body>

</html>

