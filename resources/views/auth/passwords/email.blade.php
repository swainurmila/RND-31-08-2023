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

    
    

    <!-- icons -->
    <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        /* .cust_bg {
    
    background: url('{{ asset('admin_assets/images/log_bg.jpg') }}');
    background-repeat: no-repeat;
    background-size: cover;
    overflow-y:hidden;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('forget.password.post')}}">
                    {{-- <form method="POST" action="{{ route('password.email') }}"> --}}
                        @csrf

                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="login-type" class="form-label">User Type</label>
                                <select name="logintype" id="" class="form-control" required>
                                    <option value="">--User Type--</option>
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
                                </select>
                                @error('logintype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>
