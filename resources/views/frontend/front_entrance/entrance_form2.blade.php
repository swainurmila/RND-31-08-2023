@extends('layouts.appent')
@section('content')
    <style>
        .sptb-1 {
            /* background: linear-gradient(-225deg,rgb(40 79 117) 17%,rgb(40 79 117) 92%)!important; */
            background: #1e314e !important;
        }
        form {
            width: 100%;
            height: 100%;
            border-radius: 1px solid black;
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
        .fee_structure {
            border: 1px solid #000;
            width: 100%;
            padding: 0px;

        }
        /* input[type="text"] {
                 
                 background: no-repeat;
                 border: none;
                 border-bottom: 2px dotted #000;
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

        /* input[type="text"] {
                 
                 background: none;
                 border: none;
                 border-bottom: 2px dotted #000;
                } */
        .note-box {
            background-color: #f0f0f0;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            color: red;
            width: 540px;
            margin-left: 450px;
        }

        .note-box p {
            margin: 0;
            /* font-style: italic;  */
        }

        .error {
            font-size: 11px;
            color: red;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            width: 100%;
            text-align: left;
        }

        .comm_div.d-flex .div_L {
            width: 45%;
            text-align: left;
        }

        .comm_div.d-flex .div_R {
            width: 60%;
        }

        .d-flex {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form_no {
            text-align: right;
            margin-bottom: 30px;
        }

        .form_no h4 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            line-height: 10px;
        }

        .file_up label {
            width: 100%;
            text-align: left;
        }

        .file_up {
            margin-bottom: 20px;
        }

        .file_up label {
            width: 100%;
            text-align: left;
            font-size: 12px;
        }

        lable.error2 {
            display: block;
            font-size: 12px;
            text-align: left;
            color: red;
            font-family: 'Times New Roman', Times, serif;
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

            .sig_pic input {
                width: 100% !important;
                margin: 0 !important;
            }

            .table_check_wrap {
                padding: 0;
            }
        }
    </style>

    {{-- <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader"
        style="background-position: 50% 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Entrance Form</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/" style="color: #29b6f6; font-weight: bold;">Home</a></li>
                        <b>/</b>
                        <li class="active">Entrance Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="content-wrapper">
        <div class="sptb">
            <div class="container">
                {{-- <div>
                <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
                <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
    
            </div> --}}
                <section class="fee_structure" style="margin-top: 80px; padding: 50px 40px;">
                    <div class="section-title form-section-title dsc-form">
                        <center>

                            <form action="{{ route('phd_entran_two_apply') }}" id="myForm" method="post"
                                enctype="multipart/form-data" onSubmit="return file_size_validate();">
                                @csrf

                                {{-- <div style="margin-left:50%;">
                                    <p>Form No.:BPUT/Ph.D-2019/7.1(vide Ph.D-9.1)</p>
                                </div> --}}
                                <div class="form_no">
                                    @php
                                        $prev_year = date('Y') - 1;
                                        // dd($prev_year);
                                    @endphp
                                    <h4>Form No.: BPUT/Ph.D.- {{ $prev_year }}/{{ date('Y') }}/7.1</h4>
                                    <br>
                                    <h4>(vide Ph.D.-9.1)</h4>
                                </div>

                                <div class="row-12">

                                    <div class="col-md-12 text-left">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>12. Mention the faculty in which research is to be conducted: </p>
                                            </div>
                                            <div class="div_R">
                                                <select name="department" id="dept-dropdown" class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach ($programmes as $programme)
                                                        <option value="{{ $programme->id }}">{{ $programme->program }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- <select class="form-control" name="department">
                                                    <option value="">Select Department</option>
                                                    <option value="engineering">Engineering</option>
                                                    <option value="computer_application_sciences">Computer Application and
                                                        Sciences</option>
                                                    <option value="architecture">Architecture</option>
                                                    <option value="management">Management</option>
                                                </select> --}}
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-12">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>13.Branch/Specialiazation: </p>
                                            </div>
                                            <div class="div_R">
                                                <select class="form-control" id="branch-dropdown" name="branch" value="{{ old('branch') }}">
                                                </select>
                                                {{-- <input type="text" class="form-control" name="branch"> --}}
                                                {{-- <select class="form-control" name="branch">
                                                    <option value="">Select</option>
                                                    <option value="Civil Engineering (CE)">Civil Engineering (CE)</option>
                                                    <option value="Mechanical Engineering (ME)">Mechanical Engineering (ME)
                                                    </option>
                                                    <option value="Electrical Engineering (EE)">Electrical Engineering (EE)
                                                    </option>
                                                    <option value="Electrical & Electronics Engg. (EEE)">Electrical &
                                                        Electronics Engg. (EEE)</option>
                                                    <option value="Electronics & Telecomm. Engg.(ETC)">Electronics &
                                                        Telecomm. Engg.(ETC)</option>
                                                    <option value="Computer Science &Engg. (CSE)">Computer Science &Engg.
                                                        (CSE)</option>
                                                    <option value="Information Technology (IT)">Information Technology (IT)
                                                    </option>
                                                    <option value="Production Engineering (PE)">Production Engineering (PE)
                                                    </option>
                                                    <option value="Metallurgy & Materials Engg. (MME)">Metallurgy &
                                                        Materials Engg. (MME)</option>
                                                    <option value="Chemical Engineering(CHE)">Chemical Engineering(CHE)
                                                    </option>
                                                    <option value="Physics (PH)">Physics (PH)</option>
                                                    <option value="Chemistry (CH)">Chemistry (CH)</option>
                                                    <option value="Mathematics">Mathematics</option>
                                                    <option value="Computer Application (CA)">Computer Application (CA)
                                                    </option>
                                                    <option value="Architecture">Architecture</option>
                                                    <option value="Management">Management</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="col-md-12 text-left">
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>15. Are you claimimg for exemption of Entrance test:</p>
                                        </div>
                                        <div class="div_R">
                                            <select class="form-control" name="claim_entrance" id="myselection">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="note-box">
                                        <p>
                                            (NOTE: if yes, justify the same with proper document and mention the exemption
                                            category)
                                        </p>
                                    </div>
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>16. Choose Examination Center:</p>
                                        </div>
                                        <div class="div_R">
                                            <select class="form-control" name="exam_center" id="exam_center">
                                                <option value="">Select</option>
                                                <option value="Bhubaneswar">Bhubaneswar</option>
                                                <option value="Berhampur">Berhampur</option>
                                                <option value="Rourkela">Rourkela</option>
                                            </select>
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
                                                <p>Date:</p>
                                            </div>
                                            <div class="div_R">
                                                <input class="form-control" type="date" name="date"  value="{{ date('Y-m-d') }}"/>
                                                {{-- <div id="datepicker" class="input-group date">
                                                    <input class="form-control" type="text" name="date"   />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L" style="width: 70px">
                                                <p>Place:</p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" class="form-control" name="place">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="sig_pic">
                                            <input type="file" class="form-control" name="signature2"
                                                accept="image/png, image/gif, image/jpeg"
                                                style="width: 400px;margin-left:110px;">
                                            <p><b> Full Signature of the candidate</b> </p>
                                            <p class="text-right"><small><span style="color: red;">Max file size
                                                        50kb</span></small></p>
                                        </div>

                                    </div>
                                </div>



                                <hr>
                                <div class="row" style="margin-bottom: 50px;">
                                    <h3 class="text-capitalize" style="font-size:24px">Upload Documents</h3>
                                    <h6><span style="color: red;"><b>Please upoad file of size less than
                                                500kb</b></span></small></h6>

                                    <div class="form-row clearfix">
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">10th Certificate :<sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control" name="high_school_certificate"
                                                    id="high_school_cert">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">10th Marksheet : <sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control" name="memo_high_school"
                                                    id="memo_hs_cert">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">12th Certificate : <sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control"
                                                    name="intermidiate_certificate" id="intermidiate_cert">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row clearfix">
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">12th Marksheet : <sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control" name="memo_intermediate"
                                                    id="memo_intermediate_cert">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">UG Degree Certificate : <sup class="text-danger">
                                                        *</sup></label>
                                                <input type="file" class="form-control" name="ug_certificate"
                                                    id="ug_cert">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">UG Marksheet : <sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control" name="memo_ug"
                                                    id="memo_ug_cert">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row clearfix">
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">PG Degree Certificate : <sup
                                                    class="text-danger"> *</sup> </label>
                                                <input type="file" id="pg_mphil_cert" class="form-control"
                                                    name="pg_mphil_cerficate">
                                                {{-- <label class="error2"></label> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">PG Marksheet :  <sup
                                                    class="text-danger"> *</sup></label>
                                                <input type="file" id="memo_pg_mphil_cert" class="form-control"
                                                    name="memo_pg_mphil">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">M.Phil Degree Certificate :  </label>
                                                <input type="file" id="mphil_cert" class="form-control"
                                                    name="mphil_cerficate">
                                                {{-- <label class="error2"></label> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">M.Phil Marksheet :    </label>
                                                <input type="file" id="memo_mphil_cert" class="form-control"
                                                    name="mphil_marksheet">
                                            </div>
                                        </div>
                                        @if ($phd_entrance->category == 'sc' || $phd_entrance->category == 'st' || $phd_entrance->category == 'diffirently abled')
                                            <div class="col-md-4">
                                                <div class="file_up">
                                                    <label class="form-label">SC/ST/Differently abled Certificate :<sup
                                                        class="text-danger"> *</sup>
                                                    </label>

                                                    <input type="file" id="sc_st_cert" class="form-control"
                                                        name="sc_st_certficate" required>
                                                    {{-- <sup class="text-danger"> *</sup> --}}
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    </div>
                                    <div class="form-row clearfix">
                                        <div class="col-md-4" id="proof_national_eligibility_section"
                                            style="display: none;">
                                            <div class="file_up">
                                                <label class="form-label">Proof of National Eligibility :<sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control"
                                                    name="proof_national_eligibility" id="proof_national_elig_cert">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">Passport size photograph : <sup
                                                        class="text-danger"> *</sup></label>
                                                <input type="file" class="form-control" name="passport_photographs"
                                                    id="passport_photo_cert">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="file_up">
                                                <label class="form-label">Aadhaar Card : <sup class="text-danger">
                                                        *</sup></label>
                                                <input type="file" class="form-control" name="adhaar_card"
                                                    id="adhaar_card_cert">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-center" style="font-size:24px">Enclosures: (Self attested copy of)</p>
                                    {{-- <div class="col-md-12 text-left">
                                        <p>
                                            1.High School Pass Certificate Examination or Other equivalent Examination Pass
                                            Certificate<br>
                                            2. Memorandum of Marks of high School Certificate Examination or equivalent
                                            Examinations<br>
                                            3.Pass certificates of intermediate/Diploma(Engg.etc.)Examinations<br>
                                            4.Memorandum of Marks of intermediate/Diploma(Engg.etc.)Examinations<br>
                                            5.Pass Certificate of UG or other equivalent Examinations<br>
                                            6. Memorandum of Marks of UG or other equivalent Examinations<br>
                                            7.Pass certificate of PG/M.phil Examinations<br>
                                            8.Memorandum of Marks of PG/M.phil Examination<br>
                                            9.Certificate in support of SC/ST/Differently abled Catagory as the case may be (Mention
                                            Clearly)<br>
                                            10.Proof of National Eligibility Test qualified if any(GATE/GPAT/NET etc.)<br>
                                            11. Two passport size phonographs<br>
                                            12. Aadhaar Card<br>
                                            13.Demand draft no:<input type="text"> dt:<input type="text">Bank
                                            Name:<input type="text">(Non-refundable)<br>
                                        </p>
                                    </div> --}}
                                    <div class="col-md-12 table_check_wrap">
                                        <div class="table_check_info">
                                            <table class="table table-bordered" style="width: 100%;"">
                                                <tr>
                                                    <th>1</th>
                                                    <td>
                                                        <p>10th Certificate</p>
                                                    </td>
                                                    <td><input type="checkbox" value="high_school_pass"
                                                            name="check_info[]" id="high_scl_cert_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>
                                                        <p>10th Marksheet</p>
                                                    </td>
                                                    <td><input type="checkbox" value="memorandum_high_school"
                                                            name="check_info[]" id="memo_hs_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>
                                                        <p> 12th Certificate
                                                        </p>
                                                    </td>
                                                    <td><input type="checkbox" value="certificate_of_intermediate"
                                                            name="check_info[]" id="intermidiate_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>
                                                        <p>12th Marksheet</p>
                                                    </td>
                                                    <td><input type="checkbox" value="memorandum_marks_intermediate"
                                                            name="check_info[]" id="memo_intermediate_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td>
                                                        <p>UG Degree Certificate</p>
                                                    </td>
                                                    <td><input type="checkbox" value="certificate_of_ug"
                                                            name="check_info[]" id="ug_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>6</th>
                                                    <td>
                                                        <p>UG Marksheet</p>
                                                    </td>
                                                    <td><input type="checkbox" value="memorandum_marks_ug"
                                                            name="check_info[]" id="memo_ug_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>7</th>
                                                    <td>
                                                        <p>PG Degree Certificate</p>
                                                    </td>
                                                    <td><input type="checkbox" value="certificate_of_pg_mphill"
                                                            name="check_info[]" id="pg_mphil_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>8</th>
                                                    <td>
                                                        <p>PG Marksheet</p>
                                                    </td>
                                                    <td><input type="checkbox" value="memorandum_marks_pg_mphill"
                                                            name="check_info[]" id="memo_pg_mphil_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>9</th>
                                                    <td>
                                                        <p>M.Phil Degree Certificate</p>
                                                    </td>
                                                    <td><input type="checkbox" value="mphill_certificate"
                                                            name="check_info[]" id="mphil_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>10</th>
                                                    <td>
                                                        <p>M.Phil Marksheet</p>
                                                    </td>
                                                    <td><input type="checkbox" value="mphill_marksheet"
                                                            name="check_info[]" id="memo_mphil_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>11</th>
                                                    <td>
                                                        <p>Certificate in support of SC/ST/Differently abled Catagory as the
                                                            case may be (Mention Clearly)</p>
                                                    </td>
                                                    <td><input type="checkbox" value="certificate_of_sc_st"
                                                            name="check_info[]" id="sc_st_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>12</th>
                                                    <td>
                                                        <p>Proof of National Eligibility Test qualified if any(GATE/NET
                                                            etc.)</p>
                                                    </td>
                                                    <td><input type="checkbox" value="national_eligibility"
                                                            name="check_info[]" id="proof_national_elig_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>13</th>
                                                    <td>
                                                        <p>Passport size photograph</p>
                                                    </td>
                                                    <td><input type="checkbox" value="passport_photo" name="check_info[]"
                                                            id="passport_photo_chk" checked></td>
                                                </tr>
                                                <tr>
                                                    <th>14</th>
                                                    <td>
                                                        <p>Aadhaar Card</p>
                                                    </td>
                                                    <td><input type="checkbox" value="aadhaar_card" name="check_info[]"
                                                            id="adhaar_card_chk"></td>
                                                </tr>
                                                <tr>
                                                    <th>15</th>
                                                    <td>
                                                        <p>Demand Draft no:({{ $phd_entrance->dd_no }}), Date:
                                                            ({{ $phd_entrance->dd_date }}), Bank Name:
                                                            ({{ $phd_entrance->dd_bank }}) (Non-refundable)</p>
                                                    </td>
                                                    <td><input type="checkbox" value="" name="check_info[]"
                                                            id="" checked disabled></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <br>

                                {{-- <h3 class="text-center">Draft Details</h3> --}}

                                {{-- <div class="dd_wrap">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>DD No.</th>
                                            <th>Date</th>
                                            <th>Bank Name</th>
                                        </tr>
                                        <tr>
                                            
                                            <td><input type="text" class="form-control" name="dd_no" value="{{$phd_entrance->dd_no}}"></td>
                                            <td>
                                                <input class="form-control" type="date" name="dd_date" value="{{$phd_entrance->dd_date}}"   />

                                            </td>
                                            <td><input type="text" class="form-control" name="dd_bank" value="{{$phd_entrance->dd_bank}}"></td>
                                        </tr>
                                    </table>
                                </div> --}}

                                <hr style="border: 1px solid #29b6f6; margin: 60px 0;">

                                {{-- <div class="row">
                                    <div class="col-md-12 text-left">
                                        <h4><u> For office use only</u></h4><br>
                                        <p> Serial No. of the Application:<input type="text"></p>
                                        <p> Date of Receipt<input type="text"></p><br>
                                    </div>
                                </div> --}}


                                {{-- <div class="row">
                                    <div class="col-md-6 text-left">
                                        <p><b> J.E(R&amp;D Cell),BPUT</b></p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p><b>PIC(R&amp;D),BPUT</b></p>
                                    </div>
                                   
                                </div> --}}

                                <div class="col-md-12 text-center">
                                    <input type="hidden" value="{{ $id }}" name="id">
                                    <input type="hidden" value="{{ $phd_entrance->name }}" name="name">
                                    <input type="hidden" value="{{ $phd_entrance->email }}" name="email">
                                    {{-- {{route('')}} --}}
                                    <a href="{{ route('phd_entran_draft', [$id]) }}" class="btn btn-primary">Back</a>
                                    <button type="submit" class="btn btn-primary">Save & Preview</button>
                                </div>

                            </form>


                        </center>
                    </div>
                </section>
            </div>
        </div>

    </div>

    {{-- <div class="bg-dark  text-white p-0">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">Copyright &copy; 2021
                <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology </a>
                All
                rights reserved.
            </div>
        </div>
    </div>
</div> --}}

    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
@endsection

@section('jss')
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker({
                //autoclose: true, 
                // todayHighlight: true
                format: 'yyyy-mm-dd'
            });
            $("#datepicker1").datepicker({
                //autoclose: true, 
                // todayHighlight: true
                format: 'yyyy-mm-dd'
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

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
                    department: "required",
                    branch: "required",
                    claim_entrance: "required",
                    date: "required",
                    place: "required",

                    dd_no: "required",
                    dd_date: "required",
                    dd_bank: "required",

                    signature2: {
                        required: true,
                        extension: "jpg,jpeg,png",
                        filesize: 50
                    },
                    high_school_certificate: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    memo_high_school: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    intermidiate_certificate: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    memo_intermediate: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    ug_certificate: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    memo_ug: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    
                    
                    sc_st_certficate: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    proof_national_eligibility: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    pg_mphil_cerficate:{
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    memo_pg_mphil:{
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    },
                    // passport_photographs: {
                    //     required: true,
                    //     extension: "jpg,jpeg,png,pdf",
                    //     filesize: 500
                    // },
                    adhaar_card: {
                        required: true,
                        extension: "jpg,jpeg,png,pdf",
                        filesize: 500
                    }




                },
                // Specify validation error messages
                messages: {
                    signature2: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    adhaar_card: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    // passport_photographs: {
                    //     extension: "please upload format jpg,jpeg,png,pdf ",
                    // },
                    proof_national_eligibility: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    sc_st_certficate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    memo_pg_mphil: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    pg_mphil_cerficate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    memo_ug: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    ug_certificate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    memo_intermediate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    memo_high_school: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    intermidiate_certificate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    },
                    high_school_certificate: {
                        extension: "please upload format jpg,jpeg,png,pdf ",
                    }
                }
                // }
            });

        });

        function file_size_validate() {
            //alert('hi');
            //$("#error2").html("");
            //$(".demoInputBox").css("border-color","#F0F0F0");
            var file_size = $('#pg_mphil_cerficate')[0].files[0].size;
            size = file_size / 1024;
            size = Math.round(size);
            if (size > 500) {
                $('#pg_mphil_cerficate + .error2').remove();
                $("#pg_mphil_cerficate").after("<lable class='error2'>File size must be less than 500 Kb</lable>");
                //$(".demoInputBox").css("border-color","#FF0000");
                return false;
            } else {
                $('#pg_mphil_cerficate + .error2').remove();
            }

            var file_size2 = $('#memo_pg_mphil')[0].files[0].size;
            size2 = file_size2 / 1024;
            size2 = Math.round(size2);
            if (size2 > 500) {
                $('#memo_pg_mphil + .error2').remove()
                $("#memo_pg_mphil").after("<lable class='error2'>File size must be less than 500 Kb</lable>");
                //$(".demoInputBox").css("border-color","#FF0000");
                return false;
            } else {
                $('#memo_pg_mphil + .error2').remove();
            }

            var file_size3 = $('#sc_st_certficate')[0].files[0].size;
            size3 = file_size3 / 1024;
            size3 = Math.round(size3);
            if (size3 > 500) {
                $('#sc_st_certficate + .error2').remove();
                $("#sc_st_certficate").after("<lable class='error2'>File size must be less than 500 Kb</lable>");
                //$(".demoInputBox").css("border-color","#FF0000");
                return false;
            } else {
                $('#sc_st_certficate + .error2').remove();
            }

            var file_size4 = $('#proof_national_eligibility')[0].files[0].size;
            size4 = file_size4 / 1024;
            size4 = Math.round(size4);
            if (size4 > 500) {
                $('#proof_national_eligibility + .error2').remove();
                $("#proof_national_eligibility").after("<lable class='error2'>File size must be less than 500 Kb</lable>");
                //$(".demoInputBox").css("border-color","#FF0000");
                return false;
            } else {
                $('#proof_national_eligibility + .error2').remove();
            }
            return true;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('high_school_cert');
            const checkbox = document.getElementById('high_scl_cert_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('memo_hs_cert');
            const checkbox = document.getElementById('memo_hs_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('intermidiate_cert');
            const checkbox = document.getElementById('intermidiate_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('memo_intermediate_cert');
            const checkbox = document.getElementById('memo_intermediate_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('ug_cert');
            const checkbox = document.getElementById('ug_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('memo_ug_cert');
            const checkbox = document.getElementById('memo_ug_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('pg_mphil_cert');
            const checkbox = document.getElementById('pg_mphil_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('memo_pg_mphil_cert');
            const checkbox = document.getElementById('memo_pg_mphil_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('sc_st_cert');
            const checkbox = document.getElementById('sc_st_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('proof_national_elig_cert');
            const checkbox = document.getElementById('proof_national_elig_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('passport_photo_cert');
            const checkbox = document.getElementById('passport_photo_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('adhaar_card_cert');
            const checkbox = document.getElementById('adhaar_card_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('mphil_cert');
            const checkbox = document.getElementById('mphil_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('memo_mphil_cert');
            const checkbox = document.getElementById('memo_mphil_chk');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myselection').on('change', function() {

                if (this.value == 'yes') {
                    $("#proof_national_eligibility_section").show();

                } else {
                    $("#proof_national_eligibility_section").hide();
                }


            });
        });
    </script>
    <script>
        $('#dept-dropdown').on('change', function(e) {
    
            //alert('hello2');
            e.preventDefault();
            $("#branch-dropdown").html('');
            var programmes_id = this.value;
    
            $.ajax({
                type: 'post',
                url: "{{ route('get_branch') }}",
                data: {
    
                    programmes_id: programmes_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    
                    $("#branch-dropdown").append('<option>Select Course</option>');
                    $.each(data, function(key, value) {
                        $("#branch-dropdown").append('<option value=' + value.id + '>' + value
                            .departments_title +
                            '</option>');
                    });
                    
                }
            });
    
        });
    </script>
@endsection
