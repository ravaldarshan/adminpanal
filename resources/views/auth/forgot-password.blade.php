<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codelink Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth">
      <div class="content-wrapper d-flex align-items-center auth px-0 login-half-bg">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('admin/images/logo.svg')}}" alt="logo">
              </div>
              <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to create new one.') }}
            </div>
              @if (session('status'))
                  <span class=".text-success">{{session('status')}}</span>
              @endif
              <form class="pt-3" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <!-- Email Address -->
                    <div class="form-group">
                      <label class="form-check-label text-muted">Email </label>
                      <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                      @error('email')<span style="color: red">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-2">
                    <button type="submit" class="btn btn-primary  btn-block">
                      Email Password Reset Link
                    </button>
                  </div>
                    <div class="mb-2">
                    <a href="{{route('login')}}" class="btn btn-dark btn-block ">
                      Back To Login 
                    </a>
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
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <script src="{{asset('admin/js/settings.js')}}"></script>
  <script src="{{asset('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>