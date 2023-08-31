@extends('admin.layouts.app')
@section('heading', 'Student Preview Details')
@section('sub-heading', 'Student Preview Details')
@section('content')
    <style>
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

        .enroll_no {
            display: flex;
        }

        .enroll_no {
            display: flex;
            justify-content: space-evenly;
        }

        @media print {
            .panel-content {
                padding: 0 !important;
            }

            .btn.btn-primary.waves-effect.waves-light {
                display: none;
            }
        }
    </style>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <!-- cta -->
                                <div class="panel-container show" role="content">
                                    <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                    <div class="panel-content p-4">
                                        <table>
                                            <tr>
                                                <th colspan="4">
                                                    <h4>Personal Information</h4>
                                                </th>
                                                {{-- <th style="text-align: right;">
                                                    <div class="enroll_no">
                                                        <h5>Enrollment No:</h5><h5 style="color: red;">asdas</h5>
                                                    </div>
                                                    
                                                </th> --}}

                                            </tr>
                                            <tr>
                                                <td> <b style="font-weight: bolder">Candidate Name: </b> </td>
                                                <td>{{ $data->name }}</td>
                                                <!-- <td>Academic Programme:</td>
                                                                        <td>2</td> -->
                                                <td style="text-align:center;"><img
                                                        src="{{ asset('/upload/phd_entrance/') }}/{{ $data->photo }}"
                                                        alt="" style="max-width: 80px;"></td>
                                                <td style="text-align:center;"><img
                                                        src="{{ asset('/upload/phd_entrance/') }}/{{ $data->signature }}"
                                                        alt="" style="max-width: 80px;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-weight: bolder">Gender :</b></td>
                                                <td>{{ $data->gender }}</td>
                                                <td><b style="font-weight: bolder">Father's / Husband's Name:</b></td>
                                                <td>{{ $data->father_husband_name }}</td>
                                            </tr>

                                            <tr>
                                                <td><b style="font-weight: bolder">Permanent Address:</b></td>
                                                <td>{{ $data->present_address }}</td>
                                                <td><b style="font-weight: bolder">Present Address:</b></td>
                                                <td>{{ $data->permanent_address }}</td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-weight: bolder">Email:</b></td>
                                                <td>{{ $data->email }}</td>
                                                <td><b style="font-weight: bolder">Phone No:<b></td>
                                                <td>{{ $data->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-weight: bolder">Date Of Birth:</b></td>
                                                <td>{{ $data->dob }}</td>
                                                <td><b style="font-weight: bolder">Nationality:</b></td>
                                                <td>{{ $data->nationality }}</td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-weight: bolder">Mother Tounge:</b></td>
                                                <td>{{ $data->mother_tounge }}</td>
                                                <td><b style="font-weight: bolder">Category:</b></td>
                                                <td>{{ $data->category }}</td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-weight: bolder">Branch/Specialization:</b></td>
                                                <td>{{ $data->branch }}</td>
                                                <td><b style="font-weight: bolder">Research to be conducted:</b></td>
                                                <td>{{ $data->department }}</td>
                                            </tr>

                                        </table>

                                        <table class="table mt-2">
                                            <tr>
                                                <th colspan="4">
                                                    <h4>DD Details</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>DD No.</th>
                                                <th>Date</th>
                                                <th>Bank Name</th>
                                                <th>Rs.</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $data->dd_no }}</td>
                                                <td>{{ $data->dd_date }}</td>
                                                <td>{{ $data->dd_bank }}</td>
                                                <td>1000/-</td>
                                            </tr>
                                        </table>

                                        <table class="table mt-4">
                                            <tr>
                                                <th colspan="2">
                                                    <h4>BPUT NCR - Preference</h4>
                                                </th>

                                            </tr>

                                            @foreach ($selection_ncr as $key => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item }}</td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                        </table>

                                        <table class="table mt-4">
                                            <tr>
                                                <th colspan="7">
                                                    <h4>Educational Qualification </h4>
                                                </th>

                                            </tr>
                                            <tr>
                                                <th>SL.no</th>
                                                <th>Degree</th>
                                                <th>University/Board</th>
                                                <th>Year of Passing</th>
                                                <th>Class/Division</th>
                                                <th>% of marks/ CGPA</th>
                                                <th>Major subject(s)</th>
                                            </tr>
                                            @foreach ($data_quali as $item)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->degree }}</td>
                                                    <td>{{ $item->university_board }}</td>
                                                    <td>{{ $item->year_of_passing }}</td>
                                                    <td>{{ $item->division }}</td>
                                                    <td>{{ $item->precentage }}</td>
                                                    <td>{{ $item->subject }}</td>

                                                </tr>
                                            @endforeach
                                        </table>

                                        <table class="table mt-4">
                                            <tr>
                                                <th colspan="7">
                                                    <h4>Enclosures </h4>
                                                </th>

                                            </tr>
                                            <tr>
                                                <th>1</th>
                                                <td>
                                                    <p>High School Pass Certificate Examination or Other equivalent
                                                        Examination Pass
                                                        Certificate</p>
                                                </td>
                                                <td><input type="checkbox" value="high_school_pass"
                                                        {{ in_array('high_school_pass', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->high_school_certificate) ? $data_certi->high_school_certificate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>
                                                    <p>Memorandum of Marks of high School Certificate Examination or
                                                        equivalent
                                                        Examinations</p>
                                                </td>
                                                <td><input type="checkbox" value="memorandum_high_school"
                                                        {{ in_array('memorandum_high_school', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->memo_high_school) ? $data_certi->memo_high_school : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>
                                                    <p>Pass certificates of intermediate/Diploma(Engg.etc.)Examinations</p>
                                                </td>
                                                <td><input type="checkbox" value="certificate_of_intermediate"
                                                        {{ in_array('certificate_of_intermediate', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->intermidiate_certificate) ? $data_certi->intermidiate_certificate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td>
                                                    <p>Memorandum of Marks of intermediate/Diploma(Engg.etc.)Examinations
                                                    </p>
                                                </td>
                                                <td><input type="checkbox" value="memorandum_marks_intermediate"
                                                        {{ in_array('memorandum_marks_intermediate', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->memo_intermediate) ? $data_certi->memo_intermediate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>5</th>
                                                <td>
                                                    <p>Pass Certificate of UG or other equivalent Examinations</p>
                                                </td>
                                                <td><input type="checkbox" value="certificate_of_ug"
                                                        {{ in_array('certificate_of_ug', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->ug_certificate) ? $data_certi->ug_certificate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>6</th>
                                                <td>
                                                    <p>Memorandum of Marks of UG or other equivalent Examinations</p>
                                                </td>
                                                <td><input type="checkbox" value="memorandum_marks_ug"
                                                        {{ in_array('memorandum_marks_ug', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->memo_ug) ? $data_certi->memo_ug : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>7</th>
                                                <td>
                                                    <p>Pass certificate of PG/M.phil Examinations</p>
                                                </td>
                                                <td><input type="checkbox" value="certificate_of_pg_mphill"
                                                        {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->pg_mphil_cerficate) ? $data_certi->pg_mphil_cerficate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>8</th>
                                                <td>
                                                    <p>Memorandum of Marks of PG/M.phil Examination</p>
                                                </td>
                                                <td><input type="checkbox" value="memorandum_marks_pg_mphill"
                                                        {{ in_array('memorandum_marks_pg_mphill', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->memo_pg_mphil) ? $data_certi->memo_pg_mphil : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>9</th>
                                                <td>
                                                    <p>Certificate in support of SC/ST/Differently abled Catagory as the
                                                        case may be (Mention Clearly)</p>
                                                </td>
                                                <td><input type="checkbox" value="certificate_of_sc_st"
                                                        {{ in_array('certificate_of_sc_st', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->sc_st_certficate) ? $data_certi->sc_st_certficate : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>10</th>
                                                <td>
                                                    <p>Proof of National Eligibility Test qualified if any(GATE/GPAT/NET
                                                        etc.)</p>
                                                </td>
                                                <td><input type="checkbox" value="national_eligibility"
                                                        {{ in_array('national_eligibility', $enclosures) ? 'checked' : '' }}
                                                        name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->proof_national_eligibility) ? $data_certi->proof_national_eligibility : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>11</th>
                                                <td>
                                                    <p>Two passport size phonographs</p>
                                                </td>
                                                <td><input type="checkbox"
                                                        {{ in_array('passport_photo', $enclosures) ? 'checked' : '' }}
                                                        value="passport_photo" name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->passport_photographs) ? $data_certi->passport_photographs : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>12</th>
                                                <td>
                                                    <p>Aadhaar Card</p>
                                                </td>
                                                <td><input type="checkbox"
                                                        {{ in_array('aadhaar_card', $enclosures) ? 'checked' : '' }}
                                                        value="aadhaar_card" name="check_info[]" id=""></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="show_certi('{{ isset($data_certi->adhaar_card) ? $data_certi->adhaar_card : '-' }}')">View
                                                        File</a>
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                onclick="window.print()">Print this page</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    {{-- <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
            </div>
        </div>
    </div>
</div> --}}

    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Certificate View</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body cert_view">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('js')

    <script>
        function show_certi(url) {
            // console.log(url)
            if (url == '-') {
                alert('File not available.');
            } else {
                //alert(url);
                //$('.cert_view').attr('src',url);
                $('.cert_view').html('<embed src="' + url +
                    '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
                $('#bs-example-modal-lg').modal('show');
            }
        }
    </script>
@endsection
