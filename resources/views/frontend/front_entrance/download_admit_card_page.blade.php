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

        .card {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;

            padding: 20px;
            text-align: center;
            width: 600px;
            margin: 50px auto;

        }


        /* ========= Responsive ========= */
        @media only screen and (max-width: 640px) {
            #logo img {
                max-width: 100%;
            }

            #show-mobile-menu {
                display: none;
            }
            .card {width: 90%;}
        }
    </style>
    <div class="content-wrapper">
        @if ($phd_data)
            <div class="sptb">
                <h4 style="text-align: center"><b><u>Download Admit Card</u></b></h4>
                <div class="container">
                    <div class="card">
                        <div class="card-content">

                            <p>
                                Hi, <b>{{ $phd_data->name }}</b>
                            </p>
                            {{-- <p>Your Reference Number is: <b>{{ $phd_data->registration_no }}</b></p> --}}
                            <p>Click on the Link to Download your Admit Card -<a class="download-link"
                                    download="{{ $phd_data->registration_no }}.admit-card.{{ date('Y') }}.html"
                                    href="{{ route('phdentrance-admit-card', $phd_data->id) }}"><b> Download <i
                                            class="fa fa-download"></i></b></a></p>
                        </div>

                    </div>
                </div>

            </div>
        @else
            <div class="card"
                style="background:  position: relative; box-shadow:rgb(0 0 0 / 35%) 0px 5px 15px;margin-top:50px;margin-bottom:150px;margin-left: 90px;height:200px; margin-right:90px">
                <div class="card-content" style="text-align: center;padding-top: 25px;">
                    <p>No Data Available.</p>
                </div>

            </div>
        @endif
    </div>
@endsection
