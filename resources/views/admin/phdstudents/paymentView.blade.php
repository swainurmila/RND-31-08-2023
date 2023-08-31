@extends('admin.layouts.app')

@section('content')
    <style>
        .form-row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        div#add_phdstudent_qualfication,
        div#add_employment2,
        div#add_employment3,
        div#add_best_three_publications,
        div#add_atleast_one_publications,
        div#add_phd_students {
            justify-content: space-between;
            align-items: center;
        }

        .col-md-3.cust-txt-input {
            width: 22%;
            margin-bottom: 20px;
        }

        .col-md-4.cust-txt-input2 {
            width: 30%;
            margin-bottom: 20px;
        }

        .mytooltip .tooltip-item {
            background: #c81c1c;
            cursor: pointer;
            display: inline-block;
            font-weight: 700;
            padding: 3px 10px;
            color: #fff;
        }

        .mytooltip {
            display: inline;
            position: relative;
            z-index: 999;
        }

        .mytooltip .tooltip-content {
            position: absolute;
            z-index: 9999;
            width: 360px;
            left: 50%;
            margin: 0 0 20px -180px;
            bottom: 100%;
            text-align: left;
            font-size: 14px;
            line-height: 30px;
            -webkit-box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            background: #2b2b2b;
            opacity: 0;
            cursor: default;
            pointer-events: none;
        }

        .mytooltip:hover .tooltip-content {
            pointer-events: auto;
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
            transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
        }

        .mytooltip .tooltip-content img {
            position: relative;
            display: block;
            float: left;
            margin-right: 1em;
            max-width: 100%;
        }

        /* .tab {
            display: none;
            width: 100%;
            height: 50%;
            margin: 0px auto;
        } */

        .current {
            display: block;
        }

        /* input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; } */

        button {
            background-color: #55a5db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        .previous {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 30px;
            width: 30px;
            cursor: pointer;
            margin: 0 2px;
            color: #fff;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.8;
            padding: 5px
        }

        .step.active {
            opacity: 1;
            background-color: #55a5db !important;
        }

        .step.finish {
            background-color: #55a5db;
        }

        label.error {
            color: #f00;
            font-size: 11px;
            font-style: italic;
        }

        .biju-odisha {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .form-section-title h2 {
            font-size: 1.6rem !important;
        }

        /* .tab {
            display: none;
            width: 100%;
            height: 50%;
            margin: 0px auto;
        }

        .current {
            display: block;
        } */
 

    </style>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Phd Student Form</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li> --}}
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Student Form Apply</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- cta -->
                                        <div class="panel-container show" role="content">
                                            <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                            <div class="panel-content">
                                                <div class="section-title form-section-title">
                                                    <h2 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
                                                    <p class="text-center"><b>APPLICATION FORMAT FOR ENROLMENT TO Ph.D PROGRAMME  {{ date('Y') }}</b></p>
                                                </div>

                                                <ul id="progressbar">
                                                    <li  id="account">Personal Information</li>
                                                    <li id="personal">Education Info</li>
                                                    <li class="active" id="payment">Payment Details</li>
                                                </ul>

                                                <form action="#" class="form"
                                                    method="POST" id="myForm" enctype="multipart/form-data">
                                                    @csrf
                                                   

                                                    
                                                
                                                    <a href="#">please click here for payment</a>

                                                   

                                                    
                                                {{-- <div class="mt-5 text-center">
                                                    <button type="submit" class="submit">Save & Next</button>
                                                </div> --}}
                                            
                                            </div>
                                        </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
    </div>
    

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   
@endsection
