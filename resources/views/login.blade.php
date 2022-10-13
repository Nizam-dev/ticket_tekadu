<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tekadu</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('public/image/logo/logo-mini.png')}}" />
  <link rel="stylesheet" href="{{asset('public/template/assets/css/notify.css')}}">

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('public/image/logo/logo.png')}}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post" action="{{url('login')}}">
                  @csrf
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" value="{{old('email')}}" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</btton>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
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
    <script src="{{asset('public/template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('public/template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('public/template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('public/template/assets/js/misc.js')}}"></script>
    <script src="{{asset('public/template/assets/js/jquery.notify.js')}}"></script>

    <!-- endinject -->
    @if(session()-> has("failed"))
    <script>
        $.notify({
            title: '<i  class="mdi  mdi mdi-check text-danger"> Gagal </i>',
            content: '{{session()->get("failed")}}',
            timeout: 3000,
        });
    </script>
  @endif


  </body>
</html>