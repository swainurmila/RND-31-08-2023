<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BPUT || Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('admin_assets/css/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('admin_assets/css/default/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('admin_assets/css/default/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="{{ asset('admin_assets/css/default/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        /* .cust_bg {

            background: url('{{ asset('admin_assets/images/log_bg.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-y: hidden;
        } */

        .cust_bg {
            background: url('{{ asset('admin_assets/images/log_bg.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            /* overflow-y: hidden; */
            height: 97vh;
            /* position: fixed; */
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .log_logo img {
            max-width: 110px;
        }

        .log_logo {
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            text-align: center;
            top: -70px;
            width: 110px;
            background: #fff;
            height: 110px;
            border-radius: 15px;
        }

        label {
            color: #5a5353;
            margin-bottom: 3px !important;
        }

        /* span.captcha-image img {
            height: 100%;
        } */
        .mt-1m {
            margin-top: 1rem !important;

        }

        .mb-1m {
            margin-bottom: 1rem !important;
        }

        .btn-primary {

            background-color: #58aaf6;
            border-color: #58aaf6;
        }

        .btn-warning {
            background-color: #57ac62;
            border-color: #57ac62;
        }
    </style>



</head>

<body class="cust_bg">
    <div class="account-pages mt-1m mb-5">
        {{-- <div class="header_top">
            <h1>header_top</h1>
        </div> --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <center>
                        <a href="/"><img src="{{ asset('admin_assets/images/bput_login.png') }}" alt="logo"
                                style="width: 320px;" class="mb-1m"></a>
                    </center>
                    <div class="card"
                        style="background:  position: relative; box-shadow:rgb(0 0 0 / 35%) 0px 5px 15px">
                        {{-- <div class="log_logo">
                            <img src="{{ asset('admin_assets/images/BPUT_log.png') }}" alt="">
                        </div> --}}
                        <div class="card-body p-4">

                            {{-- <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="/" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt=""
                                                style="max-width: 80px;">
                                        </span>
                                    </a>

                                    <a href="/" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt=""
                                                height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div> --}}

                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                @if (session()->has('message'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if (session()->has('message2'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message2') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <label for="login-type" class="form-label">Login Type</label>
                                    <select name="logintype" id="logintype" class="form-control">
                                        <option value="">--Login Type--</option>
                                        <option value="official"
                                            {{ old('logintype') == 'official' ? 'selected' : '' }}>BPUT-OFFICIAL
                                        </option>
                                        <option value="nodalcentre"
                                            {{ old('logintype') == 'nodalcentre' ? 'selected' : '' }}>NODAL-CENTRE
                                        </option>
                                        <option value="student" {{ old('logintype') == 'student' ? 'selected' : '' }}>
                                            STUDENT</option>
                                        <option value="supervisor"
                                            {{ old('logintype') == 'supervisor' ? 'selected' : '' }}>SUPERVISOR
                                        </option>
                                        <option value="co-supervisor"
                                            {{ old('logintype') == 'co-supervisor' ? 'selected' : '' }}>CO-SUPERVISOR
                                        </option>
                                        <option value="dsc-experts"
                                            {{ old('logintype') == 'dsc-experts' ? 'selected' : '' }}>DSC Experts
                                        </option>
                                    </select>
                                    @error('logintype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-2 d-none" id="ncr-div">
                                    <label for="ncr" class="form-label">Nodal Centers</label>
                                    <select name="ncr" id="ncr" class="form-control">
                                        <option value="">--Choose nodal center--</option>
                                        @foreach ($ncr as $item => $value)
                                            <option value="{{ $item }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('ncr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="captcha" class="form-label">Captcha</label>
                                    <div class="col-md-8" style="display: flex;">
                                        <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary refresh-button"><i
                                                class="ri-refresh-fill"></i></button>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="captcha" type="text"
                                            class="form-control @error('captcha') is-invalid @enderror" name="captcha"
                                            required>
                                        @error('captcha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkbox-signin">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                {{-- <div class="d-grid mb-0 text-center">
                                    <button type="submit" class="btn btn-primary" style="padding: 10px; border-radius: 12px;">
                                        {{ __('Login') }}
                                    </button>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-md-6 d-grid mb-0 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class=" col-md-6 text-center d-grid">
                                        {{-- <button type="submit" class="btn btn-warning" style="padding: 10px;">
                                            Register
                                        </button> --}}
                                        <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
                                        <!-- <a href="">Register</a> -->
                                    </div>
                                    <div class="col-12 text-center das">
                                        <p style="margin: 0; position: relative; bottom:-13px;">
                                            <a class="btn btn-link" href="{{ route('vew.forget') }}"
                                                style="padding: 0;">
                                                Forgot Your Password?
                                            </a>
                                        </p>
                                    </div> <!-- end col -->
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    {{-- <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; <a href="https://oasystspl.com/">Oasys Tech Solutions Pvt. LTD</a>
    </footer> --}}

    <!-- Vendor js -->
    <script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin_assets/js/app.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.refresh-button').click(function() {
                // alert('hello');
                $.ajax({
                    type: 'get',
                    url: '{{ route('refreshCaptcha') }}',
                    success: function(data) {
                        $('.captcha-image').html(data.captcha);
                    }
                });
            });

            // Condition for DSC login
            $('#logintype').on('change', (e) => {
                let type = $('#logintype').val();
                if (type == 'dsc-experts') {
                    $('#ncr-div').removeClass('d-none');
                } else {
                    $('#ncr-div').addClass('d-none');
                }
            });
        });
    </script>
</body>

</html>
