<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BPUT || Forget Password</title>
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
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
    
                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="logtype" value="{{ $logtype }}">
    
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
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
