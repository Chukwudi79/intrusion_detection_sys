<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Register</title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('src/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('src/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('src/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{asset('src/css/oneui.min.css')}}">

  </head>

  <body>

    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center" style="background-image: url({{asset('ui-data/images/slider/slider-5.webp')}}); background-repeat: no-repeat; background-position: center; background-size: cover;">
          <div class="content">
            <div class="row justify-content-center push">
              <div class="col-md-10 col-lg-8 col-xl-8">
                <!-- Sign Up Block -->
                <div class="block block-rounded mb-0">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Create Account</h3>
                    <div class="block-options">
                      <!-- <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-signup-terms">View Terms</a> -->
                      <a class="btn-block-option" href="{{route('login')}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign In">
                        <i class="fa fa-sign-in-alt"></i>
                      </a>
                    </div>
                  </div>
                  <div class="block-content">
                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                      <!-- <h1 class="h2 mb-1">OneUI</h1> -->
                      <p class="fw-medium text-muted">
                        Please fill the following details to create a new account.
                      </p>

                      <!-- Sign Up Form -->
                      <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                      <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                      <form class="js-validation-signup" action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="row py-3">
                          <div class="col-md-6">
                            <div class="mb-4">
                              <input id="company_name" type="text" class="form-control form-control-lg form-control-alt @error('company_name') is-invalid @enderror" id="signup-username" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>
  
                              @error('company_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              
                            </div>
                            <div class="mb-4">
                                <input id="company_email" type="email" class="form-control form-control-lg form-control-alt @error('company_email') is-invalid @enderror" placeholder="Company Email" name="company_email" value="{{ old('company_email') }}" required autocomplete="email">
  
                                @error('company_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                              <input id="description" type="text" class="form-control form-control-lg form-control-alt @error('description') is-invalid @enderror" id="company-description" name="description" placeholder="Description" required >
  
                                  @error('description')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              
                            </div>
                            <div class="mb-4">
                              <input id="company_phone" type="text" class="form-control form-control-lg form-control-alt" id="company_phone" placeholder="0903948332" name="company_phone" required>
                            </div>

                          </div>
                          
                          <div class="col-md-6">
                            <div class="mb-4">
                                <input id="name" type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" id="name" placeholder="Admin Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input id="role_id" type="hidden" name="role_id" value="2">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                              </div>
                              <div class="mb-4">
                                  <input id="email" type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="mb-4">
                                <input id="password" type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="Password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                              </div>
                              <div class="mb-4">
                                <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>

                          <div class="mb-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms">
                              <label class="form-check-label" for="signup-terms">I agree to Terms &amp; Conditions</label>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row mb-4">
                          <div class="col-md-6 col-xl-5">
                            <button type="submit" class="btn w-100 btn-alt-success">
                              <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Sign Up
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- END Sign Up Form -->
                    </div>
                  </div>
                </div>
                <!-- END Sign Up Block -->
              </div>
            </div>
            <div class="fs-sm text-muted text-center">
              <strong>OneUI 5.3</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>

          <!-- Terms Modal -->
          <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
              <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                  </div>
                  <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->


    <script src="{{asset('/js/oneui.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{asset('/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('/js/pages/op_auth_signup.min.js')}}"></script>
  </body>
</html>
