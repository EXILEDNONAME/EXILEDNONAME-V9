<!DOCTYPE html>
<html lang="en">
<head>
  <base href="../../../../">
  <meta charset="utf-8" />
  <title> Register Area </title>
  <meta name="description" content="Login page example" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <link href="/assets/backend/css/pages/login/classic/login-5.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/css/themes/layout/header/base/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/css/themes/layout/brand/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link href="/assets/backend/css/themes/layout/aside/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico" />
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
          <div class="d-flex flex-center mb-15">
            <a href="#"><img src="/assets/backend/media/logos/logo-letter-13.png" class="max-h-75px" alt="" /></a>
          </div>

          <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal"> REGISTER </h3>
            <p class="opacity-40"> Enter your details for login to your account </p>
          </div>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" autocomplete="off" required><br>
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('username') is-invalid @enderror" type="text" placeholder="Username" name="username" autocomplete="off" required><br>
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="off" required><br>
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" autocomplete="off" required><br>
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required><br>
              <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" id="password-confirm" type="password" name="password_confirmation" placeholder="Password Confirm" required>

              @error('name')<br>
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
              @error('username')<br>
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
              @error('email')<br>
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
              @error('phone')<br>
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
              @error('password')<br>
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror

            </div>
            <div class="form-group text-center mt-10">
              <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3"> Register </button>
            </div>
          </form>
          <div class="mt-10">
            <span class="opacity-40 mr-4"> Already have an account? </span>
            <a href="/login" class="text-white opacity-30 font-weight-normal"> Back To Login </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  var KTAppSettings = {
    "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 },
    "colors": {
      "theme": {
        "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" },
        "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" },
        "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" }
      },
      "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" }
    }, "font-family": "Poppins"
  };
  </script>

  <script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.5"></script>
  <script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
  <script src="/assets/backend/js/scripts.bundle.js?v=7.0.5"></script>
</body>
</html>
