@extends('admin.layouts.app')
@section('heading', 'Supervisor Form')
@section('sub-heading', 'Supervisor Form Apply')
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

        div#add_qualfication,
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

        /* .tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
                                                        .current{display: block;} */

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

        .error {
            color: #f00;
        }

        .biju-odisha {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .form-section-title h2 {
            font-size: 1.6rem !important;
        }
    </style>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <table>
                            <tr>
                                <th>
                                    <h4>Presonal Information</h4>
                                </th>
                                <th colspan="4" style="text-align: right;">
                                    <a class="btn btn-info waves-effect waves-light" href="#">edit</a>
                                </th>
                            </tr>
                            <tr>
                                <td><b>FullName:</b></td>
                                <td>adsf</td>
                                <!-- <td>Academic Programme:</td>
                                            <td>2</td> -->
                                <td style="text-align:right;"><img src="{{ asset('/upload/signature/') }}/asd"
                                        alt="" style="max-width: 80px;"></td>
                                <td style="text-align:right;"><img src="{{ asset('/upload/photo') }}/asd" alt=""
                                        style="max-width: 80px;">

                                </td>
                            </tr>
                            <tr>
                                <td><b>Faculty: </b></td>
                                <td>asda</td>
                                <td><b>Institution / Organisation:</b></td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td><b>Nature
                                        of Present Appointment:</b></td>
                                <td>asd</td>
                                <td><b>Date
                                        of Birth:</b></td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td><b>Age:</b></td>
                                <td>asd</td>
                                <td><b>Marital Status:</b></td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td><b>Gender:</b></td>
                                <td>asd</td>
                                <td><b>Permanent address:</b></td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td><b>Correspondence address:</b></td>
                                <td>asd</td>
                                <td><b>Present Address:</b></td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td><b>Nationality:</b></td>
                                <td>asd</td>
                                <td><b>Disciline &
                                        Specialization:<b></td>
                                <td>asd</td>
                            </tr>



                            <tr>
                                <td><b>Aadhar Card Number:</b></td>
                                <td>asd</td>
                                <td><b>Aadhar Card:</b></td>
                                <td><a href="javascript:void(0);" onclick="view_file('/upload/aadhar/asd')">View</a>
                                </td>
                            </tr>
                        </table>

                        <table>

                            <thead class="">
                                <tr>
                                    <th>
                                        <h4>Education Info</h4>
                                    </th>
                                    <th colspan="4" style="text-align: right;">
                                        <a class="btn btn-info waves-effect waves-light" href="#">edit</a>
                                    </th>
                                </tr>
                                <tr class="table-heading">
                                    <th>Exam Passed</th>
                                    <th>Specialization</th>
                                    <th>Board / University</th>
                                    <th>Year of passing</th>
                                    <th>Class / Division</th>
                                    <th>% marks/ CGPA</th>
                                    <th>Certificate</th>
                                    <th>Marksheet</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>
                                    HSC

                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    view
                                </td>
                                <td>
                                    view


                                </td>
                            </tr>
                            <tr>
                                <td>
                                    +2

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    view
                                </td>
                                <td>
                                    view

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Graduation

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    view
                                </td>
                                <td>
                                    view
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Post-Graduation

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    view
                                </td>
                                <td>
                                    view
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    MPhil

                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    asd
                                </td>
                                <td>
                                    view

                                </td>
                                <td>
                                    view

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ph.D

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    adsd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    asd

                                </td>
                                <td>
                                    view


                                </td>
                                <td>
                                    view


                                </td>
                            </tr>
                        </table>

                        <table class="table table-sm m-0 table-bordered">
                            <thead class="">
                                <tr class="table-heading">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Designation</th>
                                    <th>Pay Scale</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Type</th>
                                    <th>Appointment Date</th>
                                    <th>Experience Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>view</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm m-0 table-bordered">
                            <thead class="">
                                <tr class="table-heading">
                                    <th>Total
                                        Full-Time Experience</th>
                                    <th>Teaching
                                        experience</th>
                                    <th>Research
                                        experience</th>
                                    <th>Post Ph.D
                                        experience (in years)</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    
                                </tr>
                            </tbody>
                        </table>

                        <table>
                            <thead class="">
                                <tr>
                                    <th>
                                        <h4>Journal/Piblication</h4>
                                    </th>
                                    <th colspan="4" style="text-align: right;">
                                        <a class="btn btn-info waves-effect waves-light" href="#">edit</a>
                                    </th>
                                </tr>
                                <tr class="table-heading">
                                        <th>Title</th>
                                        <th>Author(s)</th>
                                        <th>Name of Journals</th>
                                        <th>vol,year&Page</th>
                                        <th>Indexing</th>
                                        <th>view file</th>
                                </tr>
                                <tr>
                                    <td>ASD</td>
                                    <td>ASD</td>
                                    <td>ASD</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>view</td>
                                </tr>
                            </thead>
                        </table>
                        <table>
                            <thead>
                                <th>Title</th>
                                        <th>Author(s)</th>
                                        <th>Name of Journals</th>
                                        <th>vol,year&Page</th>
                                        <th>Indexing</th>
                                        <th>view file</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>view file</td>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <th>Total
                                    Number:</th>
                                        <th>As
                                            Supervisor:</th>
                                        <th>As
                                            Co-Supervisor:</th>
                                        <th>Unreserved(UR):</th>
                                        <th>ST/SC</th>
                                        <th>Differently Abled</th>
                                        <th>National Test Qualified</th>
                                        <th>view file</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>view file</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end row -->

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">View Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->



@endsection







@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


    <script>
        // view image in a modal ========

        function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>

@endsection
