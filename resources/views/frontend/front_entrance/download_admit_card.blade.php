@extends('layouts.appent')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <style>
        body {
            /* background-color: #9f9da7; */
            font-size: 1.6rem;
            font-family: "Open Sans", sans-serif;
            color: #2b3e51;
        }

        #login-form-wrap {
            background-color: #fff;
            width: 35%;
            margin: 30px auto;
            text-align: center;
            padding: 20px 0 0 0;
            border-radius: 4px;
            box-shadow: 0px 30px 50px 0px rgba(0, 0, 0, 0.2);
        }

        #login-form {
            padding: 0 60px;
        }

        input {
            display: block;
            box-sizing: border-box;
            width: 50%;
            outline: none;
            height: 40px;
            line-height: 6px;
            border-radius: 4px;
        }

        .RefSubDiv {
            width: 400px;
            margin: 0 auto;
            height: 800px;
        }

        .custDiv {
            margin: 30px 0;
        }

        /* ========= Responsive ========= */
        @media only screen and (max-width: 640px) {
            #logo img {
                max-width: 100%;
            }

            #show-mobile-menu {
                display: none;
            }
        }
    </style>
    <div class="content-wrapper">
        <div class="sptb">
            <h4 style="text-align: center"><b><u>Download Admit Card</u></b></h4>

            <div class="container">
                <div class="row">

                    <div class="RefSubDiv">
                        <form method="GET" id="RefForm" action="{{ route('download-admit-card-page') }}">
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
                            <div class="col-md-12 custDiv">
                                <label for="ncr" class="form-label">Reference Number</label>
                                <input type="text" class="form-control" id="ref_no" name="ref_no"
                                    placeholder="Enter Referrence number" required><i
                                    class="validation"><span></span><span></span></i>
                            </div>



                            <div class="col-md-6 d-grid mb-0 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>

                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>
    </div>
@endsection
