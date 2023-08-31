@extends('admin.layouts.app')
@section('heading', 'PHD Entrance Application')
@section('sub-heading', 'PHD Entrance Application')
@section('content')
    <style>
        .trbg {
            background-color: #89d4f02e;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>


    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <section class="fee_structure clearfix">
                            <div class="section-title form-section-title dsc-form">
                                <div class="col-sm-12 text-center">
                                </div>
                                <center>
                                    <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                                    <p p style="font-size: 16px"><u><b>
                                                APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D
                                                PROGRAM(RESEARCH)(BPUT- ETR ): {{ date('Y') . '-' . (date('Y') + 1) }}
                                            </b></u></p>
                                    <p style="font-style:italic">(To be submitted by the candidate for appearing the
                                        Entrance
                                        Test /
                                        Claiming exemption from Entrance Test)</p><br>
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            DD No.: {{ $phd_data->dd_no }}
                                        </div>
                                        <div class="col-md-3">
                                            Date. : {{ $phd_data->dd_date }}
                                        </div>
                                        <div class="col-md-3">
                                            Bank Name: {{ $phd_data->dd_bank }}
                                        </div>
                                        <div class="col-md-3">
                                            Amount : Rs.1000/-(Non-refundable)
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-table">
                                        <div class="row">
                                            <div class="col-sm-8 text-left">
                                                <div class="comm_div d-flex">
                                                    <div class="div_L">
                                                        <p>1. Name of the Candidate : </p>
                                                    </div>
                                                    <div class="div_R">
                                                        <b>&nbsp;{{ $phd_data->name }}</b>
                                                    </div>

                                                </div>
                                                <div class="comm_div d-flex">
                                                    <div class="div_L">
                                                        <p>2. Father / Husband's Name: </p>
                                                    </div>
                                                    <div class="div_R">
                                                        <b>&nbsp;{{ $phd_data->father_husband_name }}</b>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <div class="pro_pic">
                                                    <img style="max-width: 80px !important;"
                                                        src="/upload/phd_entrance/{{ $phd_data->photo }}" alt=""
                                                        style="max-width: 100px; border:2px solid; margin-bottom:10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>3. Address for Correspondence</p>
                                            </div>
                                        </div>


                                        <table style="margin-top: 10px;" class="non_border_tab">
                                            <tr>
                                                <th class="text-center" style="padding-left: 10px;">Present Address</th>
                                                <th class="text-center" style="padding-left: 10px;">Permanent Address</th>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{ $phd_data->present_address }}</td>
                                                <td class="text-center">{{ $phd_data->permanent_address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="bio-data" style="margin-top: 40px;">

                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>4. Sex (Male/Female) :</p>
                                            </div>
                                            <div class="div_R">
                                                <span class="text-capitalize">&nbsp;<b>{{ $phd_data->gender }}</b></span>
                                            </div>

                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>5. Marital status (Married / Single) :</p>
                                            </div>
                                            <div class="div_R">
                                                <span
                                                    class="text-capitalize">&nbsp;<b>{{ $phd_data->marital_status }}</b></span>
                                            </div>
                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>6. Date of Birth :</p>
                                            </div>
                                            <div class="div_R">
                                                &nbsp;<b>{{ $phd_data->dob }}</b>
                                            </div>

                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>7. Category GEN/SC/ST/Differently abled:</p>
                                            </div>
                                            <div class="div_R">
                                                @if ($phd_data->category == 'diffirently abled')
                                                    <span class="">Differently abled</span>
                                                @else
                                                    <span
                                                        class="text-uppercase">&nbsp;<b>{{ $phd_data->category }}</b></span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>8. Nationality : </p>
                                            </div>
                                            <div class="div_R">
                                                &nbsp;<b>{{ $phd_data->nationality }}</b>
                                            </div>

                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>9. Mother Tongue : </p>
                                            </div>
                                            <div class="div_R">
                                                <span
                                                    class="text-capitalize">&nbsp;<b>{{ $phd_data->mother_tounge }}</b></span>
                                            </div>
                                        </div>



                                        <hr style="border: 1px solid #29b6f6;">
                                        <p class="" style="font-size: 16px">10. In case of selection,
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
                                        <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                            <b>11. Educational Qualification (HSC onwards) [Enclose self attested copy of
                                                documents] <span class="error">*</span></b>
                                        </div>
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
                                                        <p>12. Mention the faculty in which research is to be conducted:
                                                        </p>
                                                    </div>
                                                    <div class="div_R">
                                                        <span
                                                            class="text-capitalize">&nbsp;<b>{{ $prog->program }}</b></span>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-12">
                                                <div class="comm_div d-flex">
                                                    <div class="div_L">
                                                        <p>13.Branch/Specialiazation: </p>
                                                    </div>
                                                    <div class="div_R">
                                                        &nbsp;<b>{{ $prog->departments_title }}</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="comm_div d-flex">
                                                    <div class="div_L">
                                                        <p>14.Are you claiming for exemption of Entrance Test: </p>
                                                    </div>
                                                    <div class="div_R">
                                                        <span
                                                            class="text-capitalize">&nbsp;<b>{{ $phd_data->claim_entrance }}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="comm_div d-flex">
                                                    <div class="div_L">
                                                        <p>16. Exam Center: </p>
                                                    </div>
                                                    <div class="div_R">
                                                        <span
                                                            class="text-capitalize">&nbsp;<b>{{ $phd_data->exam_center }}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="text-capitalize" style="font-size:24px"><u>Declaration </u></h3>
                                            <br>
                                            <p class="text-left">
                                                I do here by declare that the information furnished in this application is
                                                true to
                                                the
                                                best of my knowledge and belief. If admitted, I shall abide by rules and
                                                regulations
                                                of
                                                the University and Nodal centre of research allotted to me. If any
                                                information
                                                furnished
                                                in this application is found to be untrue, I am liable to forfeit the seat
                                                allotted
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
                                                    <img src="/upload/phd_entrance/{{ $phd_data->signature }}"
                                                        alt="" style="max-width: 100px;  margin-bottom:10px;">
                                                    <p><b> Full Signature of the candidate</b> </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <p class="text-center" style="font-size:24px">Enclosures: (Self attested copy
                                                of)
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
                                                            <td><input type="checkbox"
                                                                    value="memorandum_marks_intermediate"
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
                                                                <p>Certificate in support of SC/ST/Differently abled
                                                                    Catagory as
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
                                                                    value="passport_photo" name="check_info[]"
                                                                    id="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>14</th>
                                                            <td>
                                                                <p>Aadhaar Card</p>
                                                            </td>
                                                            <td><input type="checkbox"
                                                                    {{ in_array('aadhaar_card', $enclosures) ? 'checked' : '' }}
                                                                    value="aadhaar_card" name="check_info[]"
                                                                    id="">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <a href="{{ route('generate.zip', $phd_data->id) }}"
                                                        class="btn btn-primary">Download All File</a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3 class="text-capitalize" style="font-size:24px">Upload Documents</h3>

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">10th Certificate :</label>

                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->high_school_certificate }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{ $phd_data->registration_no }}.10th-certificate.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->high_school_certificate }}">Download
                                                                File</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">10th Marksheet
                                                            :</label>
                                                        <input type="hidden" name="hid_memo_high_school"
                                                            value="{{ $phdCerti->memo_high_school }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->memo_high_school }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{ $phd_data->registration_no }}.10th-marksheet.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->memo_high_school }}">Download
                                                                File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">12th Certificate :</label>
                                                        <input type="hidden" name="hid_intermidiate_certificate"
                                                            value="{{ $phdCerti->intermidiate_certificate }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->intermidiate_certificate }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{ $phd_data->registration_no }}.12th-certificate.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->intermidiate_certificate }}">Download
                                                                File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
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
                                                            <a download="{{ $phd_data->registration_no }}.12th-marksheet.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->memo_intermediate }}">Download
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
                                                            <a download="{{ $phd_data->registration_no }}.ug-degree.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->ug_certificate }}">Download
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
                                                            <a download="{{ $phd_data->registration_no }}.ug-marksheet.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->memo_ug }}">Download File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
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
                                                            <a download="{{ $phd_data->registration_no }}.pg-degree.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->pg_mphil_cerficate }}">Download
                                                                File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">PG Marksheet :</label>
                                                        <input type="hidden" name="hid_memo_pg_mphil"
                                                            value="{{ $phdCerti->memo_pg_mphil }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->memo_pg_mphil }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{ $phd_data->registration_no }}.pg-marksheet.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->memo_pg_mphil }}">Download
                                                                File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($phdCerti->mphil_cerficate != '')
                                                    <div class="col-md-4">
                                                        <div class="file_up">
                                                            <label class="form-label">M.Phill Degree Certificate :</label>
                                                            <input type="hidden" name="hid_pg_mphil_cerficate"
                                                                value="{{ $phdCerti->mphil_cerficate }}">
                                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                                <a href="javascript:void(0)"
                                                                    onclick="show_certi('{{ $phdCerti->mphil_cerficate }}')">View
                                                                    File</a>
                                                                &nbsp;||
                                                                <a download="{{ $phd_data->registration_no }}.m-phill-degree.{{ date('Y') }}.pdf"
                                                                    href="{{ $phdCerti->mphil_cerficate }}">Download
                                                                    File</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($phdCerti->mphil_marksheet != '')
                                                    <div class="col-md-4">
                                                        <div class="file_up">
                                                            <label class="form-label">M.Phill Marksheet :</label>
                                                            <input type="hidden" name="hid_memo_pg_mphil"
                                                                value="{{ $phdCerti->mphil_marksheet }}">
                                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                                <a href="javascript:void(0)"
                                                                    onclick="show_certi('{{ $phdCerti->mphil_marksheet }}')">View
                                                                    File</a>
                                                                &nbsp;||
                                                                <a download="{{ $phd_data->registration_no }}.m-phill_marksheet.{{ date('Y') }}.pdf"
                                                                    href="{{ $phdCerti->mphil_marksheet }}">Download
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
                                                            <input type="hidden" name="hid_sc_st_certficate"
                                                                value="{{ $phdCerti->sc_st_certficate }}">
                                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                                <a href="javascript:void(0)"
                                                                    onclick="show_certi('{{ $phdCerti->sc_st_certficate }}')">View
                                                                    File</a>
                                                                &nbsp;||
                                                                <a download="{{ $phd_data->registration_no }}.sc/st/differently_abled.{{ date('Y') }}.pdf"
                                                                    href="{{ $phdCerti->sc_st_certficate }}">Download
                                                                    File</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                @if ($phdCerti->proof_national_eligibility != '')
                                                    <div class="col-md-4">
                                                        <div class="file_up">
                                                            <label class="form-label">Proof of National Eligibility
                                                                :</label>
                                                            <input type="hidden" name="hid_proof_national_eligibility"
                                                                value="{{ $phdCerti->proof_national_eligibility }}">
                                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                                <a href="javascript:void(0)"
                                                                    onclick="show_certi('{{ $phdCerti->proof_national_eligibility }}')">View
                                                                    File</a>
                                                                &nbsp;||
                                                                <a download="{{ $phd_data->registration_no }}.national_eligibility.{{ date('Y') }}.pdf"
                                                                    href="{{ $phdCerti->proof_national_eligibility }}">Download
                                                                    File</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">Aadhaar Card :</label>
                                                        <input type="hidden" name="hid_adhaar_card"
                                                            value="{{ $phdCerti->adhaar_card }}">
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a href="javascript:void(0)"
                                                                onclick="show_certi('{{ $phdCerti->adhaar_card }}')">View
                                                                File</a>
                                                            &nbsp;||
                                                            <a download="{{ $phd_data->registration_no }}.adhar.{{ date('Y') }}.pdf"
                                                                href="{{ $phdCerti->adhaar_card }}">Download File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">Passport Size Photo :</label>
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a download="{{ $phd_data->registration_no }}.passport_photo.{{ date('Y') }}.png"
                                                                href="{{ asset('/upload/phd_entrance/'. $phd_data->photo) }}">Download File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="file_up">
                                                        <label class="form-label">Student Signature :</label>
                                                        <div class="view_file text-left" style="margin-top: 10px;">
                                                            <a download="{{ $phd_data->registration_no }}.student_sign.{{ date('Y') }}.png"
                                                                href="{{ asset('/upload/phd_entrance/'. $phd_data->signature) }}">Download File</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12 text-center">
                                            <a href="{{ url('/exam-cell/entrance-application') }}"
                                                class="btn btn-primary waves-effect waves-light me-1"> Back</a>

                                        </div>
                                </center>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="upload_image_view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div id="view_upload_image"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function show_certi(url) {
            //alert(url);
            //$('.cert_view').attr('src',url);
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');

        }
    </script>
@endsection
