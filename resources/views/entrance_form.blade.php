@extends('layouts.appent')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<style>
    .sptb-1 {
        /* background: linear-gradient(-225deg,rgb(40 79 117) 17%,rgb(40 79 117) 92%)!important; */
        background: #1e314e !important;
    }

    .text-center.text-white {
        text-transform: uppercase;
    }

    .bannerimg {
        padding: 2rem 0 2rem;
        background-size: cover;
    }

    .content-wrapper {
        min-height: 600px;
    }

    .text-center.text-white h1 {
        font-size: 28px;
    }

    /* footer {
                             display: none;
                            } */

    table {
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        /* padding: 8px; */
    }

    th {
        text-align: center;
        font-weight: bold;
        height: 40px;
    }

    .d-none {
        display: none;
    }

    /* tr:nth-child(even) {
                              background-color: #dddddd;
                            } */
    /* .table thead {
                                
                            } */
    .table thead th {
        font-weight: bold !important;
        height: 50px !important;
    }

    .content-wrapper ul li a span {
        font-size: 15px;
    }


    section#subheader h1 {
        color: #ffffff;
        font-size: 22px;
        float: left;
        padding-right: 40px;
        text-transform: none;
        display: block;
        margin: 0px;
    }

    .subheader .breadcrumbs {
        font-size: 13px;
        color: #ffffff;
        float: right;
        list-style: none;
        margin: 10px 0px 0px 0px;
        padding: 0px;
    }

    .subheader {
        padding: 60px 0 60px 0;
    }

    .stud-form {
        margin-top: 20px;
        width: 100%;
    }

    .stud-form p {
        width: 90%;
        font-family: 'Times New Roman', Times, serif;
        font-size: 25px;
        font-weight: bold;
    }

    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .right {
        float: right;
        font-weight: bold;
        margin-right: 40px;

    }

    .main-divi {
        margin-top: 50px;

    }

    .note-rec {
        margin-top: 50px;

    }

    .date-left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .head-right {
        float: right;
        font-weight: bold;
        margin-right: 40px;
    }

    .vc-date {
        float: left;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
    }

    .c {
        clear: both;
    }

    .vc-bput {
        margin-top: 50px;
    }

    .vc-bputt {
        float: right;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
        margin-right: 40px;
    }

    .dsc-table {
        width: 90%;
    }

    .bput-table {
        border: 2px;
        width: 90%;
        height: 100%;
    }



    .form-left {
        float: left;
        padding: 10px;
        margin: 45px;

    }

    .table-data {
        float: right;
        width: 20%;
    }

    .table-data table {
        width: 40%;
        margin: 20px 0px 200px 0px;
        height: 40%;
    }

    .present {
        float: left;
        margin: 20px 60px 60px 100px;
        font-family: 'Times New Roman', Times, serif;
    }


    .stud-info {
        margin: 20px 60px 20px 0px;
        width: 50%;
    }

    .stud-info tr th {
        width: 40%;

    }



    .dec-head {
        font-family: 'Times New Roman', Times, serif;
        text-decoration: underline;
        font-weight: bold;
    }



    .declare {
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
    }

    tbody td {
        padding: 17px !important;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    textarea {
        width: 100%;
        height: 50px;
        border-bottom: 2px dotted #000;
    }

    .d-flex {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .comm_div h5 {
        margin-right: 20px;
    }


    .col-form-label {
        width: 100%;
        text-align: left;
    }

    .cust-txt-input {
        margin-bottom: 30px;
    }

    .comm_div.d-flex .div_L {
        width: 45%;
        text-align: left;
    }

    .comm_div.d-flex .div_R {
        width: 60%;
    }

    .bio-data .div_L {

        text-align: left;
    }

    .bio-data .div_R {

        text-align: left;
    }

    .error {
        font-size: 11px;
        color: red;
        font-family: 'Times New Roman', Times, serif;
        font-weight: normal;
        width: 100%;
        text-align: left;
    }

    .info-mob {
        display: none;
    }

    .dd_f1 .form-control {
        display: initial;
    }

    .dd_f1 {
        display: flex;
        justify-content: space-evenly;
    }

    .dd_f1 .error {
        text-align: center;
    }

    .form_no {
        text-align: right;
    }

    .form_no h4 {
        margin: 0;
    }

    .form_no h4 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
        line-height: 10px;
    }

    /*============= responsive ============ */
    @media only screen and (max-width: 640px) {
        .dd_f1 {
            display: none;
        }

        .d-flex {
            flex-flow: row wrap;
        }

        .comm_div.d-flex .div_L,
        .comm_div.d-flex .div_R {
            width: 100%;
        }

        .div_R input {
            width: 100% !important;
        }

        .fee_structure {
            margin-top: 20px !important;
            padding: 20px !important;
        }

        .info-desk {
            display: none;
        }

        .info-mob {
            display: block;
        }
    }
</style>

<div class="content-wrapper">
    <div class="sptb">
        <div class="container">

            <form action="{{ route('phd_entran_apply') }}" method="post" id="myForm" enctype="multipart/form-data">
                @csrf
                <section class="fee_structure clearfix" style="margin-top: 80px; padding: 50px 40px;">
                    <div class="section-title form-section-title dsc-form">
                        <div class="form_no">
                            @php
                            $prev_year = date('Y') - 1;
                            @endphp
                            <h4>Form No.: BPUT/Ph.D.- 2019/7.1</h4>
                            <br>
                            <h4>(vide Ph.D.-9.1)</h4>
                        </div>
                        <center>
                            <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                            <p style="font-size: 16px"><b>
                                    APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D PROGRAM(RESEARCH)(BPUT-
                                    ETR): {{ date('Y') . '-' . (date('Y') + 1) }}
                                </b></p>
                            <p style="font-style:italic">(To be submitted by the candidate for appearing the Entrance
                                Test /
                                Claiming exemption from Entrance Test)</p><br>
                            <div class="dd_f1">
                                <div class="dd_details">(DD No. <input type="text" class="form-control" name="dd_no" style="width: 200px"></div>
                                <div class="dd_details" style="display: flex">
                                    <p style="margin-top:4px; "> Date </p>
                                    <input class="form-control" type="date" name="dd_date" />

                                </div>
                                <div class="dd_details"> Bank Name:<input type="text" class="form-control" name="dd_bank" style="width: 200px"> </div>
                                <div class="dd_details">
                                    Rs.1000/-)(Non-refundable)
                                </div>
                            </div>
                            <div class="form-table" style="margin-top: 40px;">
                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>1. Name of the Candidate : </p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" id="name" name="name" class="form-control" style="width: 250px;">
                                            </div>

                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>2. Father / Husband's Name: </p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" name="father_husband_name" class="form-control" style="width: 250px;">
                                            </div>

                                        </div>


                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div class="pro_pic">
                                            <input type="file" class="form-control" id="photo2" name="photo2" accept="image/png, image/gif, image/jpeg">
                                            <b>Please Upload Your Photo</b><br>
                                            <small><i> Note <sup><span style="color:red">*</span></sup> Please be
                                                    advised that your application will be rejected if the picture you
                                                    have submitted is not clear and appropriate..</i></small>
                                            <br>
                                            <small><span style="color: red;">Max file size 50kb</span></small>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="c"></div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <p>3. Address for Correspondence</p>
                                </div>

                                <div class="col-md-6 clearfix">
                                    <div class="present" style="padding-top:30px;  "><u>Present Address</u>


                                        <p class="text-left" style="padding-top:10px;">
                                            <textarea name="present_address" id="" cols="30" rows="10"></textarea>
                                        </p>


                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>Mobile Contact No : </p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" name="mobile" class="form-control" style="width: 250px;" pattern="[0-9]+" maxlength="10">
                                            </div>

                                        </div>



                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>E-mail ID : </p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" name="email" class="form-control" style="width: 250px;" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" id="email">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="permanent" style="padding-top:30px;"><u>Permanent Address</u>
                                        <h5>

                                            <p class="text-left" style="padding-top:10px;">
                                                <textarea name="permanent_address" id="" cols="30" rows="10"></textarea>
                                            </p>
                                            {{-- <p class="text-right"><input type="text" style="width: 400px;"></p>
                                        <p class="text-right">Mobile Contact No <input type="text" style="width: 250px;"></p>
                                        <p class="text-right">E-mail ID <input type="text" style="width: 330px;"></p> --}}

                                        </h5>
                                    </div>
                                </div>



                            </div>
                            <div class="c"></div>
                            <div class="bio-data" style="margin-top: 40px;">

                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>4. Sex (Male/Female) :</p>
                                    </div>
                                    <div class="div_R">
                                        <select name="gender" id="" class="form-control" style="width:250px;">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                </div>




                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>5. Marital status (Married / Single) :</p>
                                    </div>
                                    <div class="div_R">
                                        <select name="marital_status" id="" class="form-control" style="width:250px;">
                                            <option value="">Select Marital status</option>
                                            <option value="married">Married</option>
                                            <option value="single">Single</option>
                                        </select>
                                    </div>

                                </div>



                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>6. Date of Birth :</p>
                                    </div>
                                    <div class="div_R">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="date" name="dob" style="width:250px;" />
                                            {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> --}}
                                        </div>
                                    </div>

                                </div>
                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>7. Category GEN /SC / ST/ Differently abled :</p>
                                    </div>
                                    <div class="div_R">
                                        <select name="category" class="form-control" id="" style="width: 250px;">
                                            <option value="">Select Category</option>
                                            <option value="gen">GEN</option>
                                            <option value="sc">SC</option>
                                            <option value="st">ST</option>
                                            <option value="diffirently abled">Differently abled</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>8. Nationality : </p>
                                    </div>
                                    <div class="div_R">
                                        <input type="text" name="nationality" class="form-control" style="width: 250px;">

                                    </div>

                                </div>
                                <div class="comm_div d-flex">
                                    <div class="div_L">
                                        <p>9. Mother Tongue : </p>
                                    </div>
                                    <div class="div_R">
                                        <input type="text" name="mother_tounge" class="form-control" style="width: 250px;">
                                    </div>
                                </div>



                                <hr style="border: 1px solid #29b6f6; margin: 60px 0;">
                                <div class="d-none">
                                    <p class="text-left">10. In case of selection, Choice of BPUT-Nodal Center of
                                        Research (NCR) (in order of preference)</p>
                                    <div class="info-data info-desk" style="margin-top: 40px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>1</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                    <th>2</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>


                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                    <th>4</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                    <th>6</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <div class="info-data info-mob" style="margin-top: 40px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>1</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <th>6</th>
                                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>


                                <h6 class="text-left"></h6>
                                <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                    <b>11. Educational Qualification (HSC onwards) [Enclose self attested copy of
                                        documents] <span class="error">*</span></b>
                                </div>

                                </br>
                                <div class="form-row clearfix" id="add_phdstudent_qualfication">
                                    <div class="col-md-4 cust-txt-input">
                                        <label class="col-form-label" for="phdstudent_qualification_field"><b>Degree
                                                :</b></label>
                                        <input type="text" id="phdstudent_qualification_field" value="" class="form-control" placeholder="Enter Degree(10th, 12th, etc) " name="phdstudent_qualification_field">
                                        <span class="text-danger" id="deg_err"></span>
                                    </div>


                                    <div class="col-md-4 cust-txt-input">
                                        <label class=" col-form-label" for="phdstudent_board_university"><b>Board /
                                                University:</b></label>
                                        <input type="text" id="phdstudent_board_university" value="" class="form-control" placeholder="Enter the Board/University Name " name="phdstudent_board_university">
                                        <span class="text-danger" id="unv_err"></span>

                                    </div>
                                    <div class="col-md-4 cust-txt-input">
                                        <label class=" col-form-label" for="phdstudent_passing_year"><b>Year of
                                                Passing</b></label>
                                        <select class="form-select form-control" id="phdstudent_passing_year" name="phdstudent_passing_year">
                                            <option value="">Choose</option>
                                            @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                            @endfor
                                        </select>
                                        <span class="text-danger" id="pass_err"></span>
                                    </div>
                                    <div class="col-md-2 cust-txt-input">
                                        <label class=" col-form-label" for="phdstudent_division"><b>Class /
                                                Division:</b></label>
                                        <input type="text" id="phdstudent_division" value="" class="form-control" placeholder="Enter Division" name="phdstudent_division">
                                        <span class="text-danger" id="div_err"></span>
                                    </div>
                                    <div class="col-md-2 cust-txt-input">
                                        <label class=" col-form-label" for="phdstudent_percentage_cgpa"><b>%
                                                marks/CGPA:</b></label>
                                        <input type="text" id="phdstudent_percentage_cgpa" value="" class="form-control" placeholder="Enter marks/CGPA" name="phdstudent_percentage_cgpa">
                                        <span class="text-danger" id="mark_err"></span>
                                    </div>
                                    <div class="col-md-4 cust-txt-input">
                                        <label class=" col-form-label" for="phdstudent_major_sub"><b>
                                                Major Subject:</b></label>
                                        <input type="text" id="phdstudent_major_sub" value="" class="form-control" placeholder="Enter Subject/ Specialization" name="phdstudent_major_sub">
                                        <span class="text-danger" id="sub_err"></span>
                                    </div>

                                    <div class="col-md-4 cust-txt-input">
                                        <div class="form-group">
                                            <button type="button" class="btn add_phdstudent_qualification_dtls2  btn-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;" id="add_phdstudent_qualification_dtls2">
                                                Add Qualification
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="tbd">
                                    <div class="table-responsive">
                                        <span class="text-danger" id="submit_err"></span>
                                        <table class="table table-bordered" style="width: 100%;">
                                            <thead style="background: #b9aaaa;">
                                                <tr>
                                                    <th scope="col">Degree</th>
                                                    <th scope="col">University/Board</th>
                                                    <th scope="col">Year of Passing</th>
                                                    <th scope="col">Class/Division</th>
                                                    <th scope="col">% of marks/ CGPA</th>
                                                    <th scope="col">Major subject(s)</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="addPhdQualifyrow2">
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>

                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary sbmt">Save & Next</button>
                                </div>
                        </center>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>



<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
@endsection

@section('jss')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#email').on('blur', function() {
            let email = $(this).val();

            $.ajax({
                type: 'post',
                url: "{{ route('checkemail') }}", // Adjust the route URL if needed
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "email": email
                },
                success: function(data) {
                    console.log(data);
                    if (data.data == 1) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Caution',
                            text: data.message,
                            html: '<span style="font-size: 16px;">' + data.message + '</span>', // Adjust the font size as needed
                            position: 'center',
                            width: '400px',
                            showConfirmButton: true,
                            confirmButtonText: 'OK',

                        });
                        $('.sbmt').addClass('disabled');
                        // alert(data.message);
                    } else {
                        $('.sbmt').removeClass('disabled');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<script>
    //         $(document).ready(function() {
    //   $("#datepicker").datepicker({ 
    //          //autoclose: true, 
    //         // todayHighlight: true
    //         format: 'yyyy-mm-dd'
    //   });
    //   $(".datepicker").datepicker({ 
    //          //autoclose: true, 
    //         // todayHighlight: true
    //         format: 'yyyy-mm-dd'
    //   });
    //   ======== disabled =======
    if ($(window).width() < 640) {
        //alert('Less than 640');
        $('.info-desk input').attr('disabled', 'disabled'); //Disable
        $('.info-mob input').removeAttr('disabled'); //Enable
    } else {
        // alert('More than 640');
        $('.info-mob input').attr('disabled', 'disabled');
        $('.info-desk input').removeAttr('disabled');;
    }
</script>

<script>
    // add qualification 

    var count = 1;
    var counter = 0;
    $(document).ready(function() {
        $('#add_phdstudent_qualification_dtls2').click(function(e) {

            //alert('hi');
            e.preventDefault();
            // var phdstudent_qualification_field = $('#phdstudent_qualification_field').valid();
            // var phdstudent_board_university = $('input[name="phdstudent_board_university"]').valid();
            // var phdstudent_passing_year = $('#phdstudent_passing_year').valid();
            // var phdstudent_division = $('input[name="phdstudent_division"]').valid();
            // var phdstudent_percentage_cgpa = $('input[name="phdstudent_percentage_cgpa"]').valid();
            // var phdstudent_major_sub = $('input[name="phdstudent_major_sub"]').valid();
            // var Certificate = $('input[name="cerificate"]').valid();
            // var marksheet = $('#marksheet').valid();


            // if (exam_passed && discipline && university && passing && division && marks &&
            //     Certificate && marksheet) {
            var phdstudent_qualification_field = $('#phdstudent_qualification_field').val();
            var phdstudent_board_university = $('#phdstudent_board_university').val();
            var phdstudent_passing_year = $('#phdstudent_passing_year').val();
            var phdstudent_division = $('#phdstudent_division').val();
            var phdstudent_percentage_cgpa = $('#phdstudent_percentage_cgpa').val();
            var phdstudent_major_sub = $('#phdstudent_major_sub').val();

            if (phdstudent_qualification_field === '') {
                $('#deg_err').html('Please Provide degree');
                $('#deg_err').css('color', '#fd3995');
            } else {
                $('#deg_err').html('');

            }
            if (phdstudent_board_university === '') {
                $('#unv_err').html('Please Provide university');
                $('#unv_err').css('color', '#fd3995');
            } else {
                $('#unv_err').html('');

            }
            if (phdstudent_passing_year === '') {
                $('#pass_err').html('Please Provide year of passing');
                $('#pass_err').css('color', '#fd3995');
            } else {
                $('#pass_err').html('');

            }
            if (phdstudent_division === '') {
                $('#div_err').html('Please Provide Division');
                $('#div_err').css('color', '#fd3995');
            } else {
                $('#div_err').html('');

            }
            if (phdstudent_percentage_cgpa === '') {
                $('#mark_err').html('Please Provide Marks');
                $('#mark_err').css('color', '#fd3995');
            } else {
                $('#mark_err').html('');

            }
            if (phdstudent_major_sub === '') {
                $('#sub_err').html('Please Provide Subject');
                $('#sub_err').css('color', '#fd3995');
            } else {
                $('#sub_err').html('');

            }
            if (phdstudent_qualification_field !== '' && phdstudent_board_university !== "" &&
                phdstudent_passing_year !== "" && phdstudent_division !== "" &&
                phdstudent_percentage_cgpa !== "" && phdstudent_major_sub !== "")
                var newRow = '<tr>' +
                    '<td>' + phdstudent_qualification_field +
                    '<input type="hidden" name="stu_quali[]" value="' +
                    phdstudent_qualification_field + '"></td>' +

                    '<td>' + phdstudent_board_university +
                    '<input type="hidden" name="stu_univer[]" value="' +
                    phdstudent_board_university + '"></td>' +
                    '<td>' + phdstudent_passing_year +
                    '<input type="hidden" name="stu_pass_year[]" value="' +
                    phdstudent_passing_year + '"></td>' +
                    '<td>' + phdstudent_division +
                    '<input type="hidden" name="stu_division[]" value="' +
                    phdstudent_division + '"></td>' +
                    '<td>' + phdstudent_percentage_cgpa +
                    '<input type="hidden" name="stu_percentage[]" value="' +
                    phdstudent_percentage_cgpa + '"></td>' +
                    '<td>' + phdstudent_major_sub +
                    '<input type="hidden" name="stu_spec[]" value="' +
                    phdstudent_major_sub + '"></td>' +

                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counter + '">Remove</button></td></tr>';
            $('.addPhdQualifyrow2').append(newRow);
            $('#phdstudent_qualification_field').val('');
            $('#phdstudent_board_university').val('');
            $('#phdstudent_passing_year').val('');
            $('#phdstudent_division').val('');
            $('#phdstudent_percentage_cgpa').val('');
            $('#phdstudent_major_sub').val('');
            count++;
            counter++;
            // }

        });

        $(".addPhdQualifyrow2").on("click", ".remove_field", function(e) {
            $(this).parent('td').parent('tr').remove();
            counter--;
            count--;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // var f=$('#photo2').files[0].size;
        // alert(f);

        $.validator.addMethod('filesize', function(value, element, param) {
            var size = element.files[0].size;
            size = size / 1024;
            size = Math.round(size);
            return this.optional(element) || size <= param;

        }, 'File size must be less than {0} Kb');
        // jQuery("#").validate({
        jQuery("#myForm").validate({
            // Specify validation rules
            //var val = {
            rules: {

                name: "required",
                father_husband_name: "required",
                //photo2: "required",
                present_address: "required",
                permanent_address: "required",
                dob: "required",
                dd_no: "required",
                dd_date: "required",
                dd_bank: "required",
                //mobile: "required",
                mobile: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                photo2: {
                    required: true,
                    extension: "jpg,jpeg,png",
                    filesize: 50
                },
                gender: "required",
                marital_status: "required",
                category: "required",
                nationality: "required",
                mother_tounge: "required",
                // phdstudent_qualification_field: "required",
                // phdstudent_board_university: "required",
                // phdstudent_passing_year: "required",
                // phdstudent_division: "required",
                // phdstudent_percentage_cgpa: "required",
                // phdstudent_major_sub: "required"
            },
            // Specify validation error messages
            messages: {
                photo2: {
                    extension: "please upload formrt jpg,png,jpeg ",
                },
            }
            // }
        });

    });
    $(document).ready(function() {
        $("#myForm").submit(function(event) {

            if ($(".addPhdQualifyrow2 tr").length === 0) {
                event.preventDefault(); // Prevent the default form submission
                // $('#submit_err').html('Please Add your Qualification');
                // $('#submit_err').css('color', '#fd3995');
                alert("Qualification Table is Empty. Please Add Qualification Details To The Table.");
            } else if ($(".addPhdQualifyrow2 tr").length === 1) {
                event.preventDefault();
                alert("Please Add All Qualification Details");
            } else if ($(".addPhdQualifyrow2 tr").length === 2) {
                event.preventDefault();
                alert("Please Add All Qualification Details");
            } else if ($(".addPhdQualifyrow2 tr").length === 3) {
                event.preventDefault();
                alert("Please Add All Qualification Details");
            }

        });
    });
</script>
@endsection