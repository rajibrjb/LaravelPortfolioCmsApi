<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Login Page</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <style>
        .alert.alert-danger {
            margin-top: 10px;
        }
    </style>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link rel="stylesheet" href="{{ asset('assets/app/custom/login/login-v1.default.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->

    <link href="../assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

    <!--begin::Global Theme Styles(used by all pages) -->
    <link rel="stylesheet" href="{{ asset('assets/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

            <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(../assets/media//bg/bg-4.jpg);">
                <div class="kt-grid__item">
                    <a href="#" class="kt-login__logo">
                        <img src="../assets/media/logos/logo-4.png">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                    <div class="kt-grid__item kt-grid__item--middle">
                        <h3 class="kt-login__title">Welcome to Metronic!</h3>
                        <h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for next generation web apps.</h4>
                    </div>
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info">
                        <div class="kt-login__copyright">
                            &copy 2018 Metronic
                        </div>
                        <div class="kt-login__menu">
                            <a href="#" class="kt-link">Privacy</a>
                            <a href="#" class="kt-link">Legal</a>
                            <a href="#" class="kt-link">Contact</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                <!--begin::Head-->
                <div class="kt-login__head">
                    <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
                    <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
                </div>

                <!--end::Head-->
                @if(Session::has('message'))
                @include('includes.flashMessage')
                @endif

            <!--begin::Body-->
                <div class="kt-login__body">


                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3>Sign In</h3>
                        </div>


                        <!--begin::Form-->
                        <form class="kt-form" method="POST" action="{{ route('login') }}" >
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!--begin::Action-->
                            <div class="kt-login__actions">
                                <a href="#" class="kt-link kt-login__link-forgot">
                                    Forgot Password ?
                                </a>

                                <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
                            </div>

                            <!--end::Action-->
                        </form>

                        <!--end::Form-->

                        <!--begin::Divider-->
                        <div class="kt-login__divider">
                            <div class="kt-divider">
                                <span></span>
                                <span>OR</span>
                                <span></span>
                            </div>
                        </div>

                        <!--end::Divider-->

                        <!--begin::Options-->
                        <div class="kt-login__options">
                            <a href="#" class="btn btn-primary kt-btn">
                                <i class="fab fa-facebook-f"></i>
                                Facebook
                            </a>
                            <a href="#" class="btn btn-info kt-btn">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="{{ url('/auth/google') }}" class="btn btn-danger kt-btn">
                                <i class="fab fa-google"></i>
                                Google
                            </a>
                        </div>

                        <!--end::Options-->
                    </div>

                    <!--end::Signin-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Content-->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

</body>

<!-- end::Body -->
</html>
