@extends('layouts.appent')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        /* .sptb-1 {
                    background: #1e314e !important;
                } */
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

        .subheader h1 {}

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

        /* p {
                        text-align: justify;
                        font-size: 10px;
                        margin: 0px 40px 0px 40px;
                        font-family: Verdana, Geneva, Tahoma, sans-serif;
                    } */

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
            margin: 20px 60px 60px 100px font-family: 'Times New Roman', Times, serif;
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

        /* input[type="text"] {
                 
                 background: none;
                 border: none;
                 border-bottom: 2px dotted #000;
                } */
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

        .datepicker-days td {
            padding: 5px 10px !important;
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

        #datepicker {
            width: 180px;
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

        .print_section {
            display: none;
        }

        .file_up {
            margin-bottom: 20px;
        }

        .file_up label {
            width: 100%;
            text-align: left;
            font-size: 12px;
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

            .pro_pic {
                text-align: center;
            }
        }


        @media print {
           .enclosures_div {
                page-break-inside: avoid !important;
                /* margin-top: 120px !important; */
            }
            .enclosures_div::before {
                content: "";
                display: block;
                height: 80px; /* Adjust the height as needed */
            }
            .header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                background-color: #333;
                color: #fff;
                padding: 10px;
            }

            /* body{display: none;} */
            div#sticked-menu {
                display: none;
            }

            footer.footer-1.bg-color-1 {
                display: none;
            }

            .print_btn {
                display: none;
            }

            /* .pro_pic img {
                    max-width: 90px !important;
                } */
            section#subheader {
                display: none;
            }

            .fee_structure {
                padding: 0 !important;
            }

            header.site-header {

                display: none;
            }

            .fee_structure {
                padding: 10px !important;
                margin: 0 !important;
            }

            @page {
                size: auto;
                margin: 0;
            }

            .col-sm-1,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12 {
                float: left;
                padding: 0;
            }

            .col-sm-12 {
                width: 100%;
            }

            .col-sm-11 {
                width: 91.66666667%;
            }

            .col-sm-10 {
                width: 83.33333333%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-8 {
                width: 66.66666667%;
            }

            .col-sm-7 {
                width: 58.33333333%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-5 {
                width: 41.66666667%;
            }

            .col-sm-4 {
                width: 33.33333333%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-2 {
                width: 16.66666667%;
            }

            .col-sm-1 {
                width: 8.33333333%;
            }


            tbody td {
                padding: 7px 10px !important;
            }

            table.per_det th {
                text-align: left;
                padding: 0 15px;
            }

            .print_section {
                padding: 30px;
                background: #cce4fd8f !important;
            }


            table.non_border_tab tr,
            table.non_border_tab td,
            table.non_border_tab th {
                border: none;
            }

            /* .header1, .footer1 {
                position: fixed;
                height:100px;
                top: 0;
                }
                .footer1 {
                               bottom:0
                } */

            .empty-header,
            .empty-footer,
            .empty-header2,
            .empty-footer2 {
                height: 50px;
            }

            .main_head th,
            .main_head td,
            .main_foot th,
            .main_foot td {
                border: none;
            }

            .content-wrapper {
                display: none;
            }

            .print_section {
                display: block;
            }

            .office_tabl {
                page-break-after: always;
            }

            .off_td tbody td,
            .off_td tbody th,
            .off_td tbody tr {
                border: none !important;
            }

        }

        @media print {}
    </style>


    <div class="print_section">
        {{-- <div class="header1">Header</div> --}}
        <form action="{{ route('phd_entran_two_apply') }}" id="myForm" method="post" enctype="multipart/form-data"
            onSubmit="return file_size_validate();">
            @csrf
            <table class="main_table">
                <thead class="main_head">
                    <th>
                    <td>
                        <div class="empty-header"></div>
                    </td>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: none!important; padding: 0 !important;">
                            <table class="non_border_tab">
                                <tr>
                                    <td class="text-right">
                                        <div class="header">
                                            @php
                                                $prev_year = date('Y') - 1;
                                            @endphp
                                            <h5>Form No.: BPUT/Ph.D.- 2019/7.1</h5>

                                            <h5>(vide Ph.D.-9.1)</h5>
                                        </div>
                                        {{-- @php
                                        $prev_year = date('Y') - 1;
                                       
                                    @endphp
                                    <h4>Form No.: BPUT/Ph.D.- 2019/7.1</h4>

                                    <h4>(vide Ph.D.-9.1)</h4> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                                        <p style="font-size: 16px"><u><b>
                                                    APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D
                                                    PROGRAM(RESEARCH)<br>(BPUT- ETR ):
                                                    {{ date('Y') . '-' . (date('Y') + 1) }}
                                                </b></u></p>
                                        <p style="font-style:italic">(To be submitted by the candidate for appearing the
                                            Entrance
                                            Test /
                                            Claiming exemption from Entrance Test)</p>
                                    </td>
                                </tr>

                            </table>
                            <hr>
                            <table class="non_border_tab">
                                <tr>
                                    <th>
                                        (DD No. {{ $phd_data->dd_no }} || Dt. {{ $phd_data->dd_date }} || Bank Name:
                                        {{ $phd_data->dd_bank }} &nbsp; Rs.1000/-)(Non-refundable)
                                    </th>
                                </tr>
                            </table>
                            <table style="margin-top: 10px;" class="non_border_tab">
                                <tr>
                                    <td> <b>Name of the Candidate :</b> </td>
                                    <td>{{ $phd_data->name }}</td>
                                    <td rowspan="2" class="text-center">
                                        <img style="max-width: 80px !important;"
                                            src="/upload/phd_entrance/{{ $phd_data->photo }}" alt=""
                                            style="max-width: 100px; border:2px solid; margin-bottom:10px;">

                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Father / Husband's Name:</b> </td>
                                    <td> {{ $phd_data->father_husband_name }}</td>
                                </tr>
                            </table>
                            <table style="margin-top: 10px;" class="non_border_tab">
                                <tr>
                                    <td colspan="2">
                                        <b>
                                            <p class="text-capitalize" style="font-size:18px">Address for Correspondence</p>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left" style="padding-left: 10px;">Address</th>
                                    <th class="text-left" style="padding-left: 10px;">Permanent Address</th>
                                </tr>
                                <tr>
                                    <td>{{ $phd_data->present_address }}</td>
                                    <td>{{ $phd_data->permanent_address }}</td>
                                </tr>
                            </table>

                            <hr>
                            <table class="per_det non_border_tab">
                                <tr>
                                    <th style="width: 50%">Mobile Contact No :</th>
                                    <td>{{ $phd_data->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail ID :</th>
                                    <td>{{ $phd_data->email }}</td>
                                </tr>
                                <tr>
                                    <th>Sex (Male/Female) :</th>
                                    <td class="text-capitalize">{{ $phd_data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Marital status (Married / Single) :</th>
                                    <td class="text-capitalize">{{ $phd_data->marital_status }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth :</th>
                                    <td>{{ $phd_data->dob }} </td>
                                </tr>
                                <tr>
                                    <th>Category GEN/SC/ST/Differently abled :</th>
                                    <td class="">@if($phd_data->category == 'diffirently abled')
                                        <span class="">Differently abled</span>
                                        @else
                                        <span class="text-uppercase">{{ $phd_data->category }}</span>
                                        @endif</td>
                                </tr>
                                <tr>
                                    <th>Nationality :</th>
                                    <td class="text-capitalize"> {{ $phd_data->nationality }} </td>
                                </tr>
                                <tr>
                                    <th> Mother Tongue : </th>
                                    <td class="text-capitalize">{{ $phd_data->mother_tounge }} </td>
                                </tr>
                                <tr>
                                    <th>Mention the faculty in which research is to be conducted : </th>
                                    <td class="text-capitalize">{{ $prog->program }} </td>
                                </tr>
                                <tr>
                                    <th>Branch/Specialiazation: </th>
                                    <td class="text-capitalize">{{ $prog->departments_title }} </td>
                                </tr>
                                <tr>
                                    <th>Are you claimimg for exemption of Entrance test : </th>
                                    <td class="text-capitalize">{{ $phd_data->claim_entrance }} </td>
                                </tr>
                                <tr>
                                    <th>Exam Center : </th>
                                    <td class="text-capitalize">{{ $phd_data->exam_center }} </td>
                                </tr>
                            </table>
                            <hr>
                            <table>
                                <tr>
                                    <td>
                                        <p class="text-center" style="font-size:18px">In case of selection, choice of
                                            BPUT-Nodal Center of Research (NCR) <br>(in
                                            order of
                                            preference)[to be filled at the time of interview]</p>
                                    </td>
                                </tr>
                            </table>


                            <table class="nodal_name">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">1</th>
                                        <td></td>
                                        <th style="width: 10%">2</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td></td>
                                        <th>4</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td></td>
                                        <th>6</th>
                                        <td></td>
                                    </tr>
                                </thead>
                            </table>


                            <table style="margin-top: 10px;">
                                <tr>
                                    <td>
                                        <p class="text-center" style="font-size:18px">Educational Qualification (HSC
                                            onwards) [Enclose self attested copy of
                                            documents]
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">Degree</th>
                                        <th scope="col">University/Board</th>
                                        <th scope="col">Year of Passing</th>
                                        <th scope="col">Class/Division</th>
                                        <th scope="col">% of marks/ CGPA</th>
                                        <th scope="col">Major subject(s)</th>
                                    </tr>
                                </thead>
                                <tbody class="addPhdQualifyrow2">
                                    @foreach ($phd_data_quali as $item)
                                        <tr>
                                            {{-- <td>{{$item->loop}}</td> --}}
                                            <td>{{ $item->degree }}</td>
                                            <td>{{ $item->university_board }}</td>
                                            <td>{{ $item->year_of_passing }}</td>
                                            <td>{{ $item->division }}</td>
                                            <td>{{ $item->precentage }}</td>
                                            <td>{{ $item->subject }}</td>
                                        </tr>
                                    @endforeach

                            </table>

                            {{-- <table>
                        <tr>
                            <td style="width: 50%;"> <b>Mention the faculty in which research is to be conducted:</b>  </td>
                            <td>{{$phd_data->department}}</td>
                        </tr>
                        <tr>
                            <td> <b>Branch/Specialiazation :</b>   </td>
                            <td>{{$phd_data->branch}}</td>
                        </tr>
                        <tr>
                            <td> <b>Are you claimimg for exemption of Entrance test:</b> </td>
                            <td>{{$phd_data->claim_entrance}}</td>
                        </tr>
                    </table> --}}

                            <table class="non_border_tab" style="margin-top: 10px;">
                                <tr>
                                    <td colspan="2">
                                        <p class="text-center" style="font-size:24px"><u>Declaration </u></p><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p> I do here by declare that the information furnished in this application is true to
                                            the
                                            best of my knowledge and belief. If admitted, I shall abide by rules and regulations
                                            of
                                            the University and Nodal centre of research allotted to me. If any information
                                            furnished
                                            in this application is found to be untrue, I am liable to forfeit the seat allotted
                                            to
                                            me any time in future and legal action be taken against me.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%"><b>Date :</b> {{ $phd_data->date }}</td>
                                    <td class="text-right">
                                        <img src="/upload/phd_entrance/{{ $phd_data->signature }}" alt=""
                                            style="max-width: 50px; max-height: 50px; border:2px solid; margin-bottom:10px;">
                                        <p> <b>Signature Of the candidate :</b>
                                        <p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50%"><b>Place :</b> {{ $phd_data->place }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <div class="print-only" style="height: 100px;"></div>
                            <table class="enclosures_div">
                                <tr>
                                    <td colspan="3">
                                        <p class="text-center" style="font-size:24px">Enclosures: (Self attested copy of)
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <td class="text-left">10th Certificate</td>
                                    <td><input type="checkbox" value="high_school_pass"
                                            {{ in_array('high_school_pass', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td class="text-left">10th Marksheet</td>
                                    <td><input type="checkbox" value="memorandum_high_school"
                                            {{ in_array('memorandum_high_school', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td class="text-left">12th Certificate
                                    </td>
                                    <td><input type="checkbox" value="memorandum_high_school"
                                            {{ in_array('memorandum_high_school', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td class="text-left">12th Marksheet
                                    </td>
                                    <td><input type="checkbox" value="memorandum_marks_intermediate"
                                            {{ in_array('memorandum_marks_intermediate', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td class="text-left">UG Degree Certificate</td>
                                    <td><input type="checkbox" value="certificate_of_ug"
                                            {{ in_array('certificate_of_ug', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td class="text-left">UG Marksheet</td>
                                    <td><input type="checkbox" value="memorandum_marks_ug"
                                            {{ in_array('memorandum_marks_ug', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td>
                                         <p>PG Degree Certificate</p>
                                    </td>
                                    <td><input type="checkbox" value="certificate_of_pg_mphill"
                                            {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <td>
                                       <p>PG Marksheet</p>
                                    </td>
                                    <td><input type="checkbox" value="memorandum_marks_pg_mphill"
                                            {{ in_array('memorandum_marks_pg_mphill', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>9</th>
                                    <td>
                                       <p>M.Phil Degree Certificate</p>
                                    </td>
                                    <td><input type="checkbox" value="mphill_certificate"
                                            {{ in_array('mphill_certificate', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <td>
                                       <p>M.Phil Marksheet</p>
                                    </td>
                                    <td><input type="checkbox" value="mphill_marksheet"
                                            {{ in_array('mphill_marksheet', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>11</th>
                                    <td>
                                        <p>Certificate in support of SC/ST/Differently abled Catagory as
                                            the case may be (Mention Clearly)</p>
                                    </td>
                                    <td><input type="checkbox" value="certificate_of_sc_st"
                                            {{ in_array('certificate_of_sc_st', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>12</th>
                                    <td>
                                        <p>Proof of National Eligibility Test qualified if
                                            any(GATE/NET etc.)</p>
                                    </td>
                                    <td><input type="checkbox" value="national_eligibility"
                                            {{ in_array('national_eligibility', $enclosures) ? 'checked' : '' }}
                                            name="check_info[]" id=""></td>
                                </tr>
                                <tr>
                                    <th>13</th>
                                    <td>
                                        <p>Passport size photograph</p>
                                    </td>
                                    <td><input type="checkbox"
                                            {{ in_array('passport_photo', $enclosures) ? 'checked' : '' }}
                                            value="passport_photo" name="check_info[]" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>14</th>
                                    <td>
                                        <p>Aadhaar Card</p>
                                    </td>
                                    <td><input type="checkbox"
                                            {{ in_array('aadhaar_card', $enclosures) ? 'checked' : '' }}
                                            value="aadhaar_card" name="check_info[]" id="">
                                    </td>
                                </tr>
                                <tr>

                                    <th>15</th>
                                    <td colspan="2">
                                        <p>Demand Draft no:({{ $phd_data->dd_no }}), Date:
                                            ({{ $phd_data->dd_date }}), Bank Name:
                                            ({{ $phd_data->dd_bank }}) (Non-refundable)</p>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                </tbody>
                <tfoot class="main_foot">
                    <tr>
                        <td>
                            <div class="empty-footer"></div>
                        </td>
                    </tr>
                </tfoot>
            </table>

            {{-- new official form print --}}
            <div class="office_tabl"></div>

            <table class="non_border_tab">
                <thead>
                    <th>
                    <td>
                        <div class=“empty-header2“></div>
                    </td>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <table class="off_td">
                                <tr>
                                    <th style="text-align: center" colspan="2">
                                        <h4>For Official Use Only</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <td style="width:50%;">Serial No. of the Application</td>
                                    <td style="width:50%;">
                                        -------------------------------------------------------
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50%;">Date of Receipt</td>
                                    <td style="width:50%;">
                                        -------------------------------------------------------
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50%;text-align:left;padding:50px 0 0 0">
                                        <h5>J.E.(R&D Cell), BPUT</h5>
                                    </td>
                                    <td style="width:50%;text-align:right;">
                                        <h5>PIC(R&D), BPUT</h5>
                                    </td>
                                </tr>
                            </table>

                            <table class="off_td">
                                <tr>
                                    <th colspan="3">
                                        <h4>Remarks of DRDC (<small>for official use only</small>)</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>The candidate may be called for Written Test(BPUT-ETR)</td>
                                    <td>
                                        <div style="width:50px; height:50px; border:1px solid #ccc;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>The candidate may be exemted from appearing the Written Test(BPUT-ETR)</td>
                                    <td>
                                        <div style="width:50px; height:50px;border:1px solid #ccc"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>The candidate does not satisfy short listing criteria,So, Recommended to be
                                        rejected</td>
                                    <td>
                                        <div style="width:50px; height:50px;border:1px solid #ccc"></div>
                                    </td>
                                </tr>
                            </table>

                            <table style="margin-top: 10px;" class="off_td">
                                <tr>
                                    <td>
                                        <div style="border-bottom:1px solid #000; margin:50px 0; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="text-align: center">(signature of members with date)</td>
                                </tr>
                            </table>

                            <table class="off_td">
                                <tr>
                                    <td style="text-align: right;">signature of Chairperson, DRDC, BPUT<br>(with date)</td>


                                </tr>
                                <tr>
                                    <td>
                                        <div style="border-bottom:1px solid #000; "></div>
                                    </td>
                                </tr>

                            </table>
                            <table class="off_td">
                                <tr>
                                    <td style="text-align: left;" colspan="2">Forwarded to: <br> The PIC(R&D), BPUT for
                                        taking further necessary action</td>
                                </tr>
                                <tr>
                                    <td>Date: ----------------</td>
                                    <td class="text-right"><b>Chairperson,DRDC,BPUT</b></td>
                                </tr>
                            </table>
                            <table style="margin-top: 25px;" class="off_td">
                                <tr>
                                    <th colspan="2" style="text-align: center">
                                        <h4>Remarks of the PIC (R&D), BPUT</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <td style="text-align: left;" colspan="2">Forwarded to: <br> The Director of
                                        Examination, BPUT for necessary action</td>
                                </tr>
                                <tr>
                                    <td>Date: ----------------</td>
                                    <td style="text-align: right"><b>PIC(R&D),BPUT</b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <th>
                    <td>
                        <div class=”empty-footer2”></div>
                    </td>
                    </th>
                </tfoot>
            </table>







            {{-- <div class="footer1">Footer</div> --}}
    </div>

    {{-- <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader"
        style="background-position: 50% 0px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Entrance Form Draft</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/" style="color: #29b6f6; font-weight: bold;">Home</a></li>
                        <b>/</b>
                        <li class="active">Entrance Form Draft</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- @if ($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif --}}
    <div class="content-wrapper">
        <div class="sptb">
            <div class="container">
                {{-- <div>
                <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
                <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
    
            </div> --}}
                <form action="{{ route('phd_entran_preview_submit', $id) }}" method="post" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    <section class="fee_structure clearfix" style="margin-top: 80px; padding: 50px 40px;">
                        <div class="section-title form-section-title dsc-form">
                            <div class="col-sm-12 text-center">                                                                                                                                                    
                                <button type="button" class="btn btn-primary waves-effect waves-light print_btn"
                                    onclick="window.print()">Print</button>

                            </div>
                            <div class="form_no">
                                @php
                                    $prev_year = date('Y') - 1;
                                    // dd($prev_year);
                                @endphp
                                <h4>Form No.: BPUT/Ph.D.- 2019/7.1</h4>
                                <br>
                                <h4>(vide Ph.D.-9.1)</h4>
                            </div>
                            <center>

                                <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                                <p p style="font-size: 16px"><u><b>
                                            APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D
                                            PROGRAM(RESEARCH)(BPUT- ETR ): {{ date('Y') . '-' . (date('Y') + 1) }}
                                        </b></u></p>
                                <p style="font-style:italic">(To be submitted by the candidate for appearing the Entrance
                                    Test /
                                    Claiming exemption from Entrance Test)</p><br>
                                <div class="dd_f1">
                                    <div class="dd_details">(DD No. <b style="width: 200px"> {{ $phd_data->dd_no }}</b>
                                    </div>
                                    <div class="dd_details" style="display: flex">
                                        <p> Dt. &nbsp; </p>
                                        <div id="datepicker2" class="input-group date">
                                            <b>{{ $phd_data->dd_date }}</b>
                                        </div>
                                    </div>
                                    <div class="dd_details"> Bank Name: &nbsp; <b>{{ $phd_data->dd_bank }}</b> </div>
                                    <div class="dd_details">
                                        Rs.1000/-)(Non-refundable)
                                    </div>
                                </div>
                                <div class="form-table" style="margin-top: 40px;">
                                    <div class="row">
                                        <div class="col-sm-8 text-left">
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>1. Name of the Candidate : </p>
                                                </div>
                                                <div class="div_R">
                                                    <b>{{ $phd_data->name }}</b>
                                                </div>

                                            </div>
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>2. Father / Husband's Name: </p>
                                                </div>
                                                <div class="div_R">
                                                    <b>{{ $phd_data->father_husband_name }}</b>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <div class="pro_pic">
                                                <img src="/upload/phd_entrance/{{ $phd_data->photo }}" alt=""
                                                    style="max-width: 100px; border:2px solid; margin-bottom:10px;">
                                                {{-- <input type="hidden" name="photo_hid" value="{{$phd_data->photo}}">
                                        <input type="file" class="form-control" name="photo2" accept="image/png, image/gif, image/jpeg">
                                        <b>Please Upload Your Photo</b><br>
                                        <small><i> Note <sup ><span style="color:red">*</span></sup>Please be advised that your application will be rejected if the picture you have submitted is not clear and appropriate</i></small>
                                        <br>
                                        <small><span style="color: red;">Max file size 50kb</span></small> --}}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="c"></div>
                                <div class="row">
                                    <div class="col-sm-12 text-left">
                                        <p>3. Address for Correspondence</p>
                                    </div>

                                    <table style="margin-top: 10px;" class="non_border_tab">
                                        {{-- <tr>
                                    <td colspan="2"><p>Address for Correspondence</p></td>
                                </tr> --}}
                                        <tr>
                                            <th class="text-center" style="padding-left: 10px;">Present Address</th>
                                            <th class="text-center" style="padding-left: 10px;">Permanent Address</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{ $phd_data->present_address }}</td>
                                            <td class="text-center">{{ $phd_data->permanent_address }}</td>
                                        </tr>
                                    </table>
                                    {{-- <div class="col-sm-6">
                                <div class="permanent" style="padding-top:30px;"><u>Permanent Address</u>
                                    <h5>
                                        
                                        <div class="text-left" style="border:1px solid; height:110px; padding:10px;">
                                            {{$phd_data->permanent_address}}
                                         </div>
                                    </h5>
                             </div>
                            </div> --}}



                                </div>
                                <div class="c"></div>
                                <div class="bio-data" style="margin-top: 40px;">

                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>4. Sex (Male/Female) :</p>
                                        </div>
                                        <div class="div_R">
                                            <span class="text-capitalize">{{ $phd_data->gender }}</span>
                                        </div>

                                    </div>




                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>5. Marital status (Married / Single) :</p>
                                        </div>
                                        <div class="div_R">
                                            <span class="text-capitalize">{{ $phd_data->marital_status }}</span>

                                        </div>

                                    </div>



                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>6. Date of Birth :</p>
                                        </div>
                                        <div class="div_R">
                                            {{ $phd_data->dob }}
                                        </div>

                                    </div>
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>7. Category GEN/SC/ST/Differently abled:</p>
                                        </div>
                                        <div class="div_R">
                                            @if($phd_data->category == 'diffirently abled')
                                            <span class="">Differently abled</span>
                                            @else
                                            <span class="text-uppercase">{{ $phd_data->category }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>8. Nationality : </p>
                                        </div>
                                        <div class="div_R">
                                            {{ $phd_data->nationality }}
                                        </div>

                                    </div>
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>9. Mother Tongue : </p>
                                        </div>
                                        <div class="div_R">
                                           <span class="text-capitalize">{{ $phd_data->mother_tounge }}</span> 
                                        </div>
                                    </div>



                                    <hr style="border: 1px solid #29b6f6; margin: 60px 0;">


                                    <p class="text-left" style="font-size: 16px">10. In case of selection,
                                        Choice of BPUT-Nodal Center of Research (NCR) (in order of preference)
                                        <br>&nbsp;&nbsp;[to be filled at the time of interview]
                                        </h4>
                                    <div class="info-data info-desk" style="margin-top: 40px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">1</th>
                                                    <td></td>
                                                    <th style="width: 10%">2</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td></td>
                                                    <th>4</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td></td>
                                                    <th>6</th>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <div class="info-data info-mob" style="margin-top: 40px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>1</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>6</th>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    {{-- <h5 class="text-left"  style="margin-top:40px; ">11. Educational Qualification (HSC onwards) [Enclose self attested copy of documents]</h5> --}}
                                    <h6 class="text-left"></h6>
                                    <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                        <b>11. Educational Qualification (HSC onwards) [Enclose self attested copy of
                                            documents] <span class="error">*</span></b>
                                    </div>
                                    {{-- <small style="display: inline-block" class="text-pink mt-2"><i>(Certificates are
                        in pdf/jpg/jpeg/png format and size must be less than
                        500kb)</i></small> --}}
                                    </br>
                                    <div class="form-row clearfix" id="add_phdstudent_qualfication">

                                    </div>
                                    <div class="tbd">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="width: 100%;">
                                                <thead style="background: #b9aaaa;">
                                                    <tr>
                                                        <th scope="col">Degree</th>
                                                        <th scope="col">University/Board</th>
                                                        <th scope="col">Year of Passing</th>
                                                        <th scope="col">Class/Division</th>
                                                        <th scope="col">% of marks/ CGPA</th>
                                                        <th scope="col">Major subject(s)</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addPhdQualifyrow2">
                                                    @foreach ($phd_data_quali as $item)
                                                        <tr>
                                                            {{-- <td>{{$item->loop}}</td> --}}
                                                            <td>{{ $item->degree }}</td>
                                                            <td>{{ $item->university_board }}</td>
                                                            <td>{{ $item->year_of_passing }}</td>
                                                            <td>{{ $item->division }}</td>
                                                            <td>{{ $item->precentage }}</td>
                                                            <td>{{ $item->subject }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="row-12">

                                        <div class="col-md-12 text-left">
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>12. Mention the faculty in which research is to be conducted: </p>
                                                </div>
                                                <div class="div_R">
                                                    <span class="text-capitalize">{{ $prog->program }}</span>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>13.Branch/Specialiazation: </p>
                                                </div>
                                                <div class="div_R">
                                                    {{ $prog->departments_title }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>14.Are you claiming for exemption of Entrance Test: </p>
                                                </div>
                                                <div class="div_R">
                                                    <span class="text-capitalize">{{ $phd_data->claim_entrance }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comm_div d-flex">
                                                <div class="div_L">
                                                    <p>16. Exam Center: </p>
                                                </div>
                                                <div class="div_R">
                                                    <span class="text-capitalize">{{ $phd_data->exam_center }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h3 class="text-capitalize" style="font-size:24px"><u>Declaration </u></h3><br>
                                        <p class="text-left">
                                            I do here by declare that the information furnished in this application is true to
                                            the
                                            best of my knowledge and belief. If admitted, I shall abide by rules and regulations
                                            of
                                            the University and Nodal centre of research allotted to me. If any information
                                            furnished
                                            in this application is found to be untrue, I am liable to forfeit the seat allotted
                                            to
                                            me any time in future and legal action be taken against me.
                                        </p><br>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <div class="comm_div d-flex">
                                                <div class="div_L" style="width: 70px">
                                                    <b>Date:</b>
                                                </div>
                                                <div class="div_R">
                                                    {{ $phd_data->date }}
                                                </div>
                                            </div>
                                            <div class="comm_div d-flex">
                                                <div class="div_L" style="width: 70px">
                                                    <b>Place:</b>
                                                </div>
                                                <div class="div_R">
                                                    {{ $phd_data->place }}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="sig_pic">
                                                <img src="/upload/phd_entrance/{{ $phd_data->signature }}" alt=""
                                                    style="max-width: 100px;  margin-bottom:10px;">
                                                <p><b> Full Signature of the candidate</b> </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <p class="text-center" style="font-size:24px">Enclosures: (Self attested copy of)
                                        </p>

                                        <div class="col-md-12 table_check_wrap">
                                            <div class="table_check_info">
                                                <table class="table table-bordered" style="width: 100%;">
                                                    <tr>
                                                        <th>1</th>
                                                        <td>
                                                            <p>10th Certificate</p>
                                                        </td>
                                                        <td><input type="checkbox" value="high_school_pass"
                                                                {{ in_array('high_school_pass', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>2</th>
                                                        <td>
                                                            <p>10th Marksheet</p>
                                                        </td>
                                                        <td><input type="checkbox" value="memorandum_high_school"
                                                                {{ in_array('memorandum_high_school', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>3</th>
                                                        <td>
                                                            <p>12th Certificate</p>
                                                        </td>
                                                        <td><input type="checkbox" value="certificate_of_intermediate"
                                                                {{ in_array('certificate_of_intermediate', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>4</th>
                                                        <td>
                                                            <p>12th Marksheet</p>
                                                        </td>
                                                        <td><input type="checkbox" value="memorandum_marks_intermediate"
                                                                {{ in_array('memorandum_marks_intermediate', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>5</th>
                                                        <td>
                                                            <p>UG Degree Certificate</p>
                                                        </td>
                                                        <td><input type="checkbox" value="certificate_of_ug"
                                                                {{ in_array('certificate_of_ug', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>6</th>
                                                        <td>
                                                            <p>UG Marksheet
                                                            </p>
                                                        </td>
                                                        <td><input type="checkbox" value="memorandum_marks_ug"
                                                                {{ in_array('memorandum_marks_ug', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>7</th>
                                                        <td>
                                                             <p>PG Degree Certificate</p>
                                                        </td>
                                                        <td><input type="checkbox" value="certificate_of_pg_mphill"
                                                                {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>8</th>
                                                        <td>
                                                           <p>PG Marksheet</p>
                                                        </td>
                                                        <td><input type="checkbox" value="memorandum_marks_pg_mphill"
                                                                {{ in_array('memorandum_marks_pg_mphill', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>9</th>
                                                        <td>
                                                           <p>M.Phil Degree Certificate</p>
                                                        </td>
                                                        <td><input type="checkbox" value="mphill_certificate"
                                                                {{ in_array('mphill_certificate', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>10</th>
                                                        <td>
                                                           <p>M.Phil Marksheet</p>
                                                        </td>
                                                        <td><input type="checkbox" value="mphill_marksheet"
                                                                {{ in_array('mphill_marksheet', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>11</th>
                                                        <td>
                                                            <p>Certificate in support of SC/ST/Differently abled Catagory as
                                                                the case may be (Mention Clearly)</p>
                                                        </td>
                                                        <td><input type="checkbox" value="certificate_of_sc_st"
                                                                {{ in_array('certificate_of_sc_st', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>12</th>
                                                        <td>
                                                            <p>Proof of National Eligibility Test qualified if
                                                                any(GATE/NET etc.)</p>
                                                        </td>
                                                        <td><input type="checkbox" value="national_eligibility"
                                                                {{ in_array('national_eligibility', $enclosures) ? 'checked' : '' }}
                                                                name="check_info[]" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>13</th>
                                                        <td>
                                                            <p>Passport size photograph</p>
                                                        </td>
                                                        <td><input type="checkbox"
                                                                {{ in_array('passport_photo', $enclosures) ? 'checked' : '' }}
                                                                value="passport_photo" name="check_info[]" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>14</th>
                                                        <td>
                                                            <p>Aadhaar Card</p>
                                                        </td>
                                                        <td><input type="checkbox"
                                                                {{ in_array('aadhaar_card', $enclosures) ? 'checked' : '' }}
                                                                value="aadhaar_card" name="check_info[]" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
    
                                                        <th>15</th>
                                                        <td colspan="2">
                                                            <p>Demand Draft no:({{ $phd_data->dd_no }}), Date:
                                                                ({{ $phd_data->dd_date }}), Bank Name:
                                                                ({{ $phd_data->dd_bank }}) (Non-refundable)</p>
                                                        </td>
                                                        {{-- <td><input type="checkbox" {{ in_array('aadhaar_card', $enclosures) ? 'checked' : ''}} value="aadhaar_card"  name="check_info[]" id=""></td> --}}
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <h3 class="text-capitalize" style="font-size:24px">Upload Documents</h3>
                                        <h6><span style="color: red;"><b>(Note: You should download all the documents along
                                                    with the form and submit it to BPUT)</b></span></small></h6>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">10th Certificate :</label>
                                                    {{-- <input type="file" class="form-control" name="high_school_certificate" id=""> --}}
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->high_school_certificate }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.10th-certificate.{{date("Y")}}.pdf"
                                                            href="{{ $phdCerti->high_school_certificate }}">Download
                                                            File</a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">10th Marksheet
                                                        :</label>
                                                    {{-- <input type="file" class="form-control" name="memo_high_school" id=""> --}}
                                                    <input type="hidden" name="hid_memo_high_school"
                                                        value="{{ $phdCerti->memo_high_school }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->memo_high_school }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.10th-marksheet.{{date("Y")}}.pdf" href="{{ $phdCerti->memo_high_school }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">12th Certificate :</label>
                                                    {{-- <input type="file" class="form-control" name="intermidiate_certificate" id=""> --}}
                                                    <input type="hidden" name="hid_intermidiate_certificate"
                                                        value="{{ $phdCerti->intermidiate_certificate }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->intermidiate_certificate }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.12th-certificate.{{date("Y")}}.pdf"
                                                            href="{{ $phdCerti->intermidiate_certificate }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">12th Marksheet
                                                        :</label>
                                                    {{-- <input type="file" class="form-control" name="memo_intermediate" id=""> --}}
                                                    <input type="hidden" name="hid_memo_intermediate"
                                                        value="{{ $phdCerti->memo_intermediate }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->memo_intermediate }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.12th-marksheet.{{date("Y")}}.pdf" href="{{ $phdCerti->memo_intermediate }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">UG Degree Certificate :</label>
                                                    {{-- <input type="file" class="form-control" name="ug_certificate" id=""> --}}
                                                    <input type="hidden" name="hid_ug_certificate"
                                                        value="{{ $phdCerti->ug_certificate }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->ug_certificate }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.ug-degree.{{date("Y")}}.pdf" href="{{ $phdCerti->ug_certificate }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">UG Marksheet :</label>
                                                    {{-- <input type="file" class="form-control" name="memo_ug" id=""> --}}
                                                    <input type="hidden" name="hid_memo_ug"
                                                        value="{{ $phdCerti->memo_ug }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->memo_ug }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.ug-marksheet.{{date("Y")}}.pdf" href="{{ $phdCerti->memo_ug }}">Download File</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">PG Degree Certificate :</label>
                                                    {{-- <input type="file" class="form-control" name="pg_mphil_cerficate" id=""> --}}
                                                    <input type="hidden" name="hid_pg_mphil_cerficate"
                                                        value="{{ $phdCerti->pg_mphil_cerficate }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->pg_mphil_cerficate }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.pg-degree.{{date("Y")}}.pdf" href="{{ $phdCerti->pg_mphil_cerficate }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">PG Marksheet :</label>
                                                    {{-- <input type="file" class="form-control" name="memo_pg_mphil" id=""> --}}
                                                    <input type="hidden" name="hid_memo_pg_mphil"
                                                        value="{{ $phdCerti->memo_pg_mphil }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->memo_pg_mphil }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.pg-marksheet.{{date("Y")}}.pdf" href="{{ $phdCerti->memo_pg_mphil }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($phdCerti->mphil_cerficate != '')
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">M.Phill Degree Certificate :</label>
                                                    {{-- <input type="file" class="form-control" name="pg_mphil_cerficate" id=""> --}}
                                                    <input type="hidden" name="hid_pg_mphil_cerficate"
                                                        value="{{ $phdCerti->mphil_cerficate }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->mphil_cerficate }}')">View
                                                            File</a>
                                                            &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.m-phill-degree.{{date("Y")}}.pdf" href="{{ $phdCerti->mphil_cerficate }}">Download
                                                            File</a>
    
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($phdCerti->mphil_marksheet != '')
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">M.Phill Marksheet :</label>
                                                    {{-- <input type="file" class="form-control" name="memo_pg_mphil" id=""> --}}
                                                    <input type="hidden" name="hid_memo_pg_mphil"
                                                        value="{{ $phdCerti->mphil_marksheet }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->mphil_marksheet }}')">View
                                                            File</a>
                                                            &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.m-phill_marksheet.{{date("Y")}}.pdf" href="{{ $phdCerti->mphil_marksheet }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($phdCerti->sc_st_certficate != '')
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">SC/ST/Differently abled Certificate
                                                            :</label>
                                                        {{-- <input type="file" class="form-control" name="sc_st_certficate" id=""> --}}
                                                        <input type="hidden" name="hid_sc_st_certficate"
                                                            value="{{ $phdCerti->sc_st_certficate }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->sc_st_certficate }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{$phd_data->registration_no}}.sc/st/differently_abled.{{date("Y")}}.pdf" href="{{ $phdCerti->sc_st_certficate }}">Download
                                                                File</a>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        @endif
                                        <div class="form-row">
                                            @if ($phdCerti->proof_national_eligibility != '')
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">Proof of National Eligibility :</label>
                                                        {{-- <input type="file" class="form-control" name="proof_national_eligibility" id=""> --}}
                                                        <input type="hidden" name="hid_proof_national_eligibility"
                                                            value="{{ $phdCerti->proof_national_eligibility }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->proof_national_eligibility }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{$phd_data->registration_no}}.national_eligibility.{{date("Y")}}.pdf"
                                                                href="{{ $phdCerti->proof_national_eligibility }}">Download
                                                                File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            {{-- <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">Passport size photograph:</label>
                                                    
                                                    <input type="hidden" name="hid_passport_photographs"
                                                        value="{{ $phdCerti->passport_photographs }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->passport_photographs }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download href="{{ $phdCerti->passport_photographs }}">Download
                                                            File</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">Aadhaar Card :</label>
                                                    {{-- <input type="file" class="form-control" name="adhaar_card" id=""> --}}
                                                    <input type="hidden" name="hid_adhaar_card"
                                                        value="{{ $phdCerti->adhaar_card }}">
                                                    <div class="view_file text-left" style="margin-top: 10px;">
                                                        <a href="javascript:void(0)"
                                                            onclick="show_certi('{{ $phdCerti->adhaar_card }}')">View
                                                            File</a>
                                                        &nbsp;||
                                                        <a download="{{$phd_data->registration_no}}.adhar.{{date("Y")}}.pdf" href="{{$phdCerti->adhaar_card }}">Download File</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 text-center">
                                        {{-- {{route('')}} --}}
                                        <input type="hidden" value="{{ $id }}" name="id">
                                        <input type="hidden" value="{{ $phd_data->name }}" name="name">
                                        <input type="hidden" value="{{ $phd_data->email }}" name="email">
                                        {{-- <a href="{{route('phd_entran_draft',[$id])}}" class="btn btn-primary">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        {{-- <button type="button" class="btn btn-primary waves-effect waves-light print_btn" onclick="$('.print_section').print();">Print this page</button> --}}
                                        <button type="button" class="btn btn-primary waves-effect waves-light print_btn"
                                            onclick="window.print()">Print</button>

                                    </div>
                            </center>
                        </div>
                    </section>
                </form>
            </div>
        </div>

    </div><br><br>



    {{-- <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a> --}}

    <!-- Modal -->
    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Certificate View
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body cert_view">
                    <img src="" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker({
                //autoclose: true, 
                // todayHighlight: true
                format: 'yyyy-mm-dd'
            });

            $(".datepicker").datepicker({
                //autoclose: true, 
                // todayHighlight: true
                format: 'yyyy-mm-dd'
            });

            //   ======== disabled =======
            if ($(window).width() < 640) {
                //alert('Less than 640');
                $('.info-desk input').attr('disabled', 'disabled'); //Disable
                $('.info-mob input').removeAttr('disabled'); //Enable
            } else {
                //alert('More than 640');
                $('.info-mob input').attr('disabled', 'disabled');
                $('.info-desk input').removeAttr('disabled');;
            }
        });

        // print js
        $(document).ready(function() {
            $.fn.extend({
                print: function() {
                    var frameName = 'printIframe';
                    var doc = window.frames[frameName];
                    if (!doc) {
                        $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
                        doc = window.frames[frameName];
                    }
                    doc.document.body.innerHTML = this.html();
                    doc.window.print();
                    return this;
                }
            });
        });
    </script>

    <script>
        // add qualification 

        var count = 1;
        var counter = 0;
        $(document).ready(function() {
            $('#add_phdstudent_qualification_dtls2').click(function(e) {

                //alert('hi');
                e.preventDefault();
                // var exam_passed = $('#phdstudent_qualification_field').valid();
                // var discipline = $('input[name="phdstudent_specialization"]').valid();
                // var university = $('input[name="phdstudent_board_university"]').valid();
                // var passing = $('#phdstudent_passing_year').valid();
                // var division = $('input[name="phdstudent_division"]').valid();
                // var marks = $('input[name="phdstudent_percentage_cgpa"]').valid();
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
                    mobile: "required",
                    email: "required",
                    gender: "required",
                    marital_status: "required",
                    category: "required",
                    nationality: "required",
                    mother_tounge: "required",


                },
                // Specify validation error messages
                messages: {

                }
                // }
            });

        });
    </script>
    <script>
        function delete_stu_quali(id, stud_id) {
            alert(stud_id);

            var id = id;
            var stud_id = stud_id;
            $.ajax({
                type: 'post',
                url: "{{ route('remove_qualification') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "stud_id": stud_id
                },
                dataType: 'json',
                success: function(data) {
                    $('.addPhdQualifyrow2').empty();
                    console.log(data);
                    //return false;
                    $.each(data, function(key, value) {

                        newRow += '<tr>' +
                            '<td>' + value.degree + '</td>' +
                            '<td>' + value.university_board +
                            '</td>' +
                            '<td>' + value.year_of_passing +
                            '</td>' +
                            '<td>' + value.division +
                            '</td>' +
                            '<td>' + value.precentage +
                            '</td>' +
                            '<td>' + value.subject +
                            '</td>' +


                            '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field2" onclick="delete_stu_quali(' +
                            value.id + ', ' + value.stud_id + ')">Remove</button></td></tr>';
                    });
                    $('.addPhdQualifyrow2').append(newRow);

                }
            });


        }


        function show_certi(url) {
            //alert(url);
            //$('.cert_view').attr('src',url);
            $('.cert_view').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#default-example-modal').modal('show');

        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = "{{ $successMessage }}";
            const additionalPart =
                "\n\n\n Dully filled Application Form and other required documents, along with Demand Draft, should be addressed to the Director Examination, Biju Patnaik University of Technology, Odisha, Chhend, Rourkela - 769015, Sundergarh, and should reach on or before 16/08/2023.";
            if (successMessage) {
                swal('Success', successMessage + additionalPart, 'success');
            }
        });
    </script>
@endsection
