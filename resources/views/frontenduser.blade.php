<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Users Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../admin-panel/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../admin-panel/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../admin-panel/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../admin-panel/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../admin-panel/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../admin-panel/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign up to register.</h6>
              <form class="pt-3" method="POST" action="{{route('user.store')}}">
             
    @csrf

    {{-- Name Field --}}
    <div class="form-group">
        <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
    </div>

    {{-- Email Field --}}
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
    </div>

    {{-- Password Field --}}
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
    </div>

    {{-- Phone Field --}}
    <div class="form-group">
        <input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone">
    </div>

    {{-- City (as select options) --}}
    <div class="form-group">
        <select name="city" class="form-control form-control-lg">
            <option value="">Select City</option>
            <option value="Karachi">Karachi</option>
            <option value="Lahore">Lahore</option>
            <option value="Islamabad">Islamabad</option>
            <option value="Rawalpindi">Rawalpindi</option>
            <option value="Peshawar">Peshawar</option>
            <option value="Quetta">Quetta</option>
        </select>
    </div>

    {{-- Address Field --}}
    <div class="form-group">
        <textarea name="address" class="form-control form-control-lg" rows="3" placeholder="Address"></textarea>
    </div>

    {{-- Submit Button --}}
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            SIGN IN
        </button>
    </div>
</form>

              
               
                <div class="text-center mt-4 font-weight-light">
                Have already account? <a href="{{route('frontenduser')}}" class="text-primary">login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../admin-panel/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../admin-panel/js/off-canvas.js"></script>
  <script src="../../admin-panel/js/hoverable-collapse.js"></script>
  <script src="../../admin-panel/js/template.js"></script>
  <script src="../../admin-panel/js/settings.js"></script>
  <script src="../../admin-panel/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
