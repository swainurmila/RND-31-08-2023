<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BPUT || RND Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico') }}">

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
        label.error {
            color: red;
        }

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
    </style>

</head>

<body class="loading cust_bg">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="card">
                        {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="#" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt=""
                                                style="max-width: 80px;">
                                        </span>
                                    </a>

                                    {{-- <a href="index.html" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </a> --}}
                                </div>
                                <h4 class="mb-4 mt-3">Register Form</h4>
                            </div>
                            <form method="POST" action="{{ route('register.store') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="tab">

                                    <div class="mb-2 row">
                                        <div class="col-md-12 apply_for">
                                            <label class="col-md-12 col-form-label"><b>Apply For : <span
                                                        class="error">*</span>
                                                </b></label>
                                            <select class="form-select" id="apply_for" name="apply_for">
                                                <option value="">Select</option>
                                                <option value="supervisor"
                                                    {{ old('apply_for') == 'supervisor' ? 'selected' : '' }}>
                                                    Supervisor</option>
                                                <option value="co-supervisor"
                                                    {{ old('apply_for') == 'co-supervisor' ? 'selected' : '' }}>
                                                    Co-Supervisor</option>
                                                <option
                                                    value="dsc"{{ old('apply_for') == 'dsc' ? 'selected' : '' }}>
                                                    DSC(Doctoral Scrutiny Committee)</option>
                                                <option value="student"
                                                    {{ old('apply_for') == 'student' ? 'selected' : '' }}>Ph.D.
                                                    Programme</option>
                                            </select>
                                            <span class="error-msg"></span>
                                            @if ($errors->has('apply_for'))
                                                <span class="text-danger">{{ $errors->first('apply_for') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 phd_prog">
                                            <label class="col-md-12 col-form-label"><b>Select Ph.D. Programme: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <select class="form-select" id="phd_prog" name="phd_prog"
                                                aria-invalid="true">
                                                <option value="">Choose Academic Programme</option>
                                                <option value="Computer Science"
                                                    {{ old('phd_prog') == 'Computer Science' ? 'selected' : '' }}>
                                                    Computer
                                                    Science</option>
                                                <option value="Civil Engineering"
                                                    {{ old('phd_prog') == 'Civil Engineering' ? 'selected' : '' }}>
                                                    Civil
                                                    Engineering</option>
                                                <option value="Mechanical Engineering"
                                                    {{ old('phd_prog') == 'Mechanical Engineering' ? 'selected' : '' }}>
                                                    Mechanical Engineering</option>
                                                <option value="Bio Technology"
                                                    {{ old('phd_prog') == 'Bio Technology' ? 'selected' : '' }}>Bio
                                                    Technology
                                                </option>
                                                <option value="Electrical Engineering"
                                                    {{ old('phd_prog') == 'Electrical Engineering' ? 'selected' : '' }}>
                                                    Electrical Engineering</option>
                                                <option value="Chemical Engineering"
                                                    {{ old('phd_prog') == 'Chemical Engineering' ? 'selected' : '' }}>
                                                    Chemical
                                                    Engineering</option>
                                                <option value="Engineering Design"
                                                    {{ old('phd_prog') == 'Engineering Design' ? 'selected' : '' }}>
                                                    Engineering
                                                    Design</option>
                                                <option value="Mathematics"
                                                    {{ old('phd_prog') == 'Mathematics' ? 'selected' : '' }}>
                                                    Mathematics
                                                </option>
                                                <option value="Material Engineering"
                                                    {{ old('phd_prog') == 'Material Engineering' ? 'selected' : '' }}>
                                                    Material
                                                    Engineering</option>
                                                <option value="Ocean Engineering"
                                                    {{ old('phd_prog') == 'Ocean Engineering' ? 'selected' : '' }}>
                                                    Ocean
                                                    Engineering</option>
                                            </select>
                                            <span class="error-msg"></span>
                                            @if ($errors->has('phd_prog'))
                                                <span class="text-danger">{{ $errors->first('phd_prog') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>First Name: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="text" id="fname" value="{{ old('fname') }}"
                                                name="fname" class="form-control error">
                                            <span class="error-msg"></span>
                                            @if ($errors->has('fname'))
                                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>Last Name: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="text" id="lname" value="{{ old('lname') }}"
                                                name="lname" class="form-control error">
                                            <span class="error-msg"></span>
                                            @if ($errors->has('lname'))
                                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-md-6">
                                            <label class="col-form-label"><b>Father/Husband’s Name: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="text" id="father_husband_name"
                                                value="{{ old('father_husband_name') }}" name="father_husband_name"
                                                class="form-control error">
                                            <span class="error-msg"></span>
                                            @if ($errors->has('father_husband_name'))
                                                <span
                                                    class="text-danger">{{ $errors->first('father_husband_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label"><b>Gender: <span class="error">*</span>
                                                </b></label>
                                            <select class="form-control" name="gender" id="">
                                                <option value="">-- Gender --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            {{-- <input type="text" id="father_husband_name"
                                            value="{{ old('gender') }}" name="gender"
                                            class="form-control error"> --}}
                                            <span class="error-msg"></span>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>Mobile No: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="tel" id="phone" value="{{ old('phone') }}"
                                                name="phone" class="form-control error">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>Email ID: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="email" id="email" value="{{ old('email') }}"
                                                name="email" class="form-control error">
                                            <span class="error-msg"></span>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="mb-2 row">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>Password: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="password" id="password" value="" name="password"
                                                class="form-control error">
                                            <span class="error-msg"></span>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label"><b>Confirm Password: <span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="password" id="cpass" value=""
                                                name="password_confirmation" class="form-control error">

                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        {{-- <div class="col-md-6">
                                            <label class="col-form-label"><b>OTP Sent to Registered Mobile/Email<span
                                                        class="error">*</span>
                                                </b></label>
                                            <input type="text" id="otp" value="" name="otp"
                                                class="form-control error">
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="captcha"
                                                    class="col-md-4 col-form-label text-md-right">Captcha</label>
                                                <div class="col-md-8" style="display: flex;">
                                                    <span class="captcha-image">{!! Captcha::img() !!}</span>
                                                    &nbsp;&nbsp;
                                                    <button type="button" class="btn btn-primary refresh-button"><i
                                                            class="ri-refresh-fill"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <input id="captcha" type="text"
                                                        class="form-control @error('captcha') is-invalid @enderror"
                                                        name="captcha" required>
                                                    @error('captcha')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:right; margin-top: 5px;">
                                        {{-- <button type="button" class="previous">Previous</button>
                                        <button type="button" class="next">Next</button> --}}
                                        <button type="submit"
                                            class="submit btn btn-success float-sm-end">Submit</button>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('login') }}">Already registered? Please login here.    </a>
                                </div>
                                {{-- Circles which indicates the steps of the form: --}}
                                {{-- <div style="text-align:center;margin-top:40px;">
                                    <span class="step">1</span>
                                    <span class="step">2</span>
                                </div> --}}
                        </div>
                    </div>

                    </form>
                    <footer class="text-center">
                        {{ date('Y') }} &copy; <a href="https://oasystspl.com/">Oasys Tech Solutions Pvt. LTD</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>





    <!-- Vendor js -->
    <script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin_assets/js/app.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/multi-form.js') }}"></script> --}}



    <script type="text/javascript">
        $(document).ready(function() {

            $phd_prog = $('.phd_prog').hide();

            $('#apply_for').on('change', function() {
                // alert( this.value );
                //var app_val = $(this).find("option:selected").text();
                var app_val = $(this).val();
                if (app_val == '11') {
                    $('.phd_prog').show();
                    $('.apply_for').removeClass('col-md-12').addClass('col-md-6');
                } else {
                    $('.phd_prog').hide();
                    $('.apply_for').removeClass('col-md-6').addClass('col-md-12');
                }

                //alert(app_val);

            });

        });


        $(document).ready(function() {
            $('.refresh-button').click(function() {
                //alert('hello');
                $.ajax({
                    type: 'get',
                    url: '{{ route('refreshCaptcha') }}',
                    success: function(data) {
                        $('.captcha-image').html(data.captcha);
                    }
                });
            });
        });





        $(document).ready(function() {

            $('#myForm').validate({
                // var val = {
                // Specify validation rules
                rules: {
                    apply_for: "required",
                    fname: "required",
                    lname: "required",
                    phd_prog: "required",
                    father_husband_name: "required",
                    gender: "required",

                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 16,
                    },
                    cpass: {
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                // Specify validation error messages
                messages: {
                    apply_for: "Select the post you want to appaly",
                    phd_prog: "This feild is required",
                    fname: "First name is required",
                    lname: "Last name is required",
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid e-mail",
                    },
                    phone: {
                        required: "Phone number is requied",
                        minlength: "Please enter 10 digit mobile number",
                        maxlength: "Please enter 10 digit mobile number",
                        digits: "Only numbers are allowed in this field"
                    },

                    // username: {
                    //     required: "Username is required",
                    //     minlength: "Username should be minimum 4 characters",
                    //     maxlength: "Username should be maximum 16 characters",
                    // },
                    password: {
                        required: "Password is required",
                        minlength: "Password should be minimum 4 characters",
                        maxlength: "Password should be maximum 16 characters",
                    },
                    cpass: "confirm password not match"
                }
                //}
            });
            // $("#myForm").multiStepForm({
            //     // defaultStep:0,
            //     beforeSubmit: function(form, submit) {
            //         console.log("called before submiting the form");
            //         console.log(form);
            //         console.log(submit);
            //     },
            //     validations: val,
            // }).navigateTo(0);
        });
    </script>

</body>

</html>
