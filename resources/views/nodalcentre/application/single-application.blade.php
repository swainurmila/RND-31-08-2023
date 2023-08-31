@extends('admin.layouts.app')
@section('heading', 'PHD Student Verify')
@section('sub-heading', 'Verify Student')
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

        .font-weight-bold {
            font-weight: bold;
            color: #000000;
        }
    </style>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Personal Information <span
                                            class="badge bg-{{ Helper::appliedApplicationStatusColor($student->application_status) }} p-1 text-uppercase float-end">Application
                                            Status :
                                            {{ Helper::appliedApplicationStatus($student->application_status) }}
                                        </span>
                                    </h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Enrollment Number</th>
                                <th>{{ $student->enrollment_no }}</th>
                                <th>Enrollment Date</th>
                                <td>{{ Helper::date_format($student->enrollment_date, '-') }}</td>
                            </tr>
                            <tr>
                                <td> <b>Candidate Name: </b> </td>
                                <td>{{ $student->name }}</td>
                                <td style="text-align:right;">
                                    @php
                                        $img = $student->photo != '' ? $student->photo : 'student.jpg';
                                    @endphp
                                    <img src="{{ asset('/upload/photo/' . $img) }}" alt="Student Photo"
                                        style="max-width: 80px;">

                                </td>
                                <td style="text-align:center;">
                                    <img src="{{ asset('/upload/signature/' . $student->signature) }}" alt="Signature"
                                        style="max-width: 80px;">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Name Of NCR And Department:</b></td>
                                <td>{{ $student->ncr_department }}</td>
                                <td><b>Father's / Husband's Name:</b></td>
                                <td>{{ $student->father_husband }}</td>
                            </tr>
                            <tr>
                                <td><b>Mother's Name:</b></td>
                                <td>{{ $student->mother }}</td>
                                <td><b>Nodal Centre:</b></td>
                                <td>{{ $student->college_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Permanent Address:</b></td>
                                <td>{{ $student->permannt_address }}</td>
                                <td><b>Present Address:</b></td>
                                <td>{{ $student->present_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>{{ $student->email }}</td>
                                <td><b>Phone No:<b></td>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <td><b>Date Of Birth:</b></td>
                                <td>{{ Helper::date_format($student->dob, '-') }}</td>
                                <td><b>Nationality:</b></td>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                            <tr>
                                <td><b>Student Category:</b></td>
                                <td>{{ $student->student_category }}</td>
                                <td><b>Category:</b></td>
                                <td>{{ $student->category }}</td>
                            </tr>
                            <tr>
                                <td><b>Aadhar Card Number:</b></td>
                                <td>{{ $student->aadhar_card }}</td>
                                <td><b>Aadhar Card:</b></td>
                                <td><a href="javascript:void(0);"
                                        onclick="view_file('/upload/aadhar/{{ $student->aadhar_certificate }}')">View</a>
                                </td>
                            </tr>
                        </table>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Payment Details</h5>

                                </th>
                            </tr>
                            <tr>
                                <th>Transaction ID:</b></th>
                                <td>{{ isset($transaction_history->transaction_id) ? $transaction_history->transaction_id : '-' }}
                                </td>
                                <th>Invoice:</th>
                                <td style="text-align:center;"><a href="javascript:void(0);"
                                        onclick="viewInvoice('{{ $student->id }}');"><i class="far fa-eye"></i></a></td>
                            </tr>
                        </table>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="10">
                                    <h5>Information Respect To Qualification</h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Sl No.</th>
                                <th>Exam Passed</th>
                                <th>Specialization</th>
                                <th>Board / University</th>
                                <th>Year Of Passing</th>
                                <th>Class / Division</th>
                                <th>% Marks/ CGPA</th>
                                <th>view certificate</th>
                                <th>view Marksheet</th>
                                {{-- <th>Remarks</th> --}}
                            </tr>
                            @foreach ($student_qualifications as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->exam_passed }}</td>
                                    <td>{{ $value->Specialization }}</td>
                                    <td>{{ $value->board_university }}</td>
                                    <td>{{ $value->year_of_passing }}</td>
                                    <td>{{ $value->division }}</td>
                                    <td>{{ $value->percentage }}</td>
                                    <td><a href="javascript:void(0);"
                                            onclick="view_file('/upload/phdstudent/{{ $value->certificate }}')">View
                                    </td>
                                    <td><a href="javascript:void(0);"
                                            onclick="view_file('/upload/phdstudent/{{ $value->marksheet }}')">View
                                    </td>
                                    {{-- <td>
                                        {!! Str::length($value->nodal_remarks) > 10 ? Str::limit($value->nodal_remarks, 10) : $value->nodal_remarks !!}
                                        @if (Str::length($value->nodal_remarks) > 10)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $value->nodal_remarks }}');">view</a>
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </table>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="6">
                                    <h5>Organisation where working</h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Sl No.</th>
                                <th>Organisation Name</th>
                                <th>Designation</th>
                                <th>Duration</th>
                                <th>Nature Of Job</th>
                                {{-- <th>Remarks</th> --}}
                            </tr>
                            @if (count($organisation) > 0)
                                @foreach ($organisation as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->organisation_name }}</td>
                                        <td>{{ $value->designation }}</td>
                                        <td>{{ $value->duration }}</td>
                                        <td>{{ $value->natutre_of_job }}</td>
                                        {{-- <td>
                                            {!! Str::length($value->nodal_remarks) > 10 ? Str::limit($value->nodal_remarks, 10) : $value->nodal_remarks !!}
                                            @if (Str::length($value->nodal_remarks) > 10)
                                                <a href="javascript:void(0);"
                                                    onclick="view_remark('{{ $value->nodal_remarks }}');">view</a>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center bg-warning text-white">No organisation mention
                                    </td>
                                </tr>
                            @endif
                        </table>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="6">
                                    <h5>Other Documents</h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Sl No.</th>
                                <th>Document Name</th>
                                <th>Document</th>
                                {{-- <th>Remarks</th> --}}
                            </tr>
                            @if (count($documents) > 0)
                                @foreach ($documents as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->doc_title }}</td>
                                        <td><a href="javascript:void(0);"
                                                onclick="view_file('/upload/phdstudent/other_doc/{{ $value->doc_path }}')">View</a>
                                        </td>
                                        {{-- <td>
                                            {!! Str::length($value->nodal_remark) > 10 ? Str::limit($value->nodal_remark, 10) : $value->nodal_remark !!}
                                            @if (Str::length($value->nodal_remark) > 10)
                                                <a href="javascript:void(0);"
                                                    onclick="view_remark('{{ $value->nodal_remark }}');">view</a>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center bg-warning text-white">No Documents Upload</td>
                                </tr>
                            @endif
                        </table>


                        {{-- @if ($domain_experts->isNotEmpty())
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel-container show" role="content">
                                        <div class="panel-content">
                                            <table class="">
                                                <tr class="trbg">
                                                    <th colspan="6">
                                                        <h5>Domain Expert from inside Odisha (Atleast one expert external to
                                                            that BPUT-NCR)
                                                        </h5>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="text-center bg-warning text-white">SlNo</td>
                                                    <td class="text-center bg-warning text-white">Name</td>
                                                    <td class="text-center bg-warning text-white">Designation</td>
                                                    <td class="text-center bg-warning text-white">Address</td>
                                                    <td class="text-center bg-warning text-white">Email</td>
                                                    <td class="text-center bg-warning text-white">Mobile No</td>
                                                </tr>
                                                <tbody>
                                                    @foreach ($domain_experts as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $item['name'] ?? '' }}</td>
                                                            <td>{{ $item['designation'] ?? '' }}</td>
                                                            <td>{{ $item['address'] ?? '' }}</td>
                                                            <td>{{ $item['email_id'] ?? '' }}</td>
                                                            <td>{{ $item['contact_no'] ?? '' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <b>Supervisor Remark on Professor:</b>
                                            </div>
                                            <div class="col-md-8" style="margin-left: -70px;">
                                                {{ $tbl_remarks->supervisor }}
                                            </div>
                                            <div class="col-md-3">
                                                <b>NCR Remark on Professor:</b>
                                            </div>
                                            <div class="col-md-3" style="margin-left: -70px;">
                                                {{ $tbl_remarks->ncr }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="panel-container show" role="content">
                                    <div class="panel-content">
                                        <table class="">
                                            <tr class="trbg">
                                                <th colspan="6">
                                                    <h5>Recommendation of NCR</h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="ncr_recommendation_status" id="ncr_recommendation_status" class="form-control">
                                                        <option value="1">Recommend</option>
                                                        <option value="0">Not Recommended</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- @endif --}}

                        <table class="mb-2">
                            @php
                                $oraga = count($organisation);
                                $dse = $supervisor->co_supervisor_name;
                            @endphp
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Supervisor Details</h5>
                                </th>
                            </tr>
                            <tr>
                                <th><b>Proposed Supervisor Name:</th>
                                <td>{{ $supervisor->supervisor_name }}</td>
                                <th>Supervisor Address:</th>
                                <td>{{ $supervisor->supervisor_address }}</td>
                            </tr>
                            <tr>
                                <th>Supervisor E-Mail Id:</th>
                                <td>{{ $supervisor->supervisor_email }}</td>
                                <th>Supervisor Phone:</th>
                                <td>{{ $supervisor->supervisor_phone }}</td>
                            </tr>
                            @if ($dse != '')
                                <tr>
                                    <th>Proposed DSE Name:</th>
                                    <td>{{ $supervisor->co_supervisor_name }}</td>
                                    <th>DSE E-Mail:</th>
                                    <td>{{ $supervisor->co_supervisor_email }}</td>
                                </tr>
                                <tr>
                                    <th>DSE Address :</th>
                                    <td>{{ $supervisor->co_supervisor_address }}</td>
                                    <th>DSE Phone :</td>
                                    <td>{{ $supervisor->co_supervisor_phone }}</td>
                                </tr>
                            @endif
                            {{-- <tr>
                                <th>Remarks</th>
                                <td>
                                    {!! Str::length($supervisor->nodal_remarks) > 10
                                        ? Str::limit($supervisor->nodal_remarks, 10)
                                        : $supervisor->nodal_remarks !!}
                                    @if (Str::length($supervisor->nodal_remarks) > 10)
                                        <a href="javascript:void(0);"
                                            onclick="view_remark('{{ $supervisor->nodal_remarks }}');">view</a>
                                    @endif
                                </td>
                                <td colspan="2"></td>
                            </tr> --}}
                        </table>
                        <br>
                        @if ($domain_experts->isNotEmpty())
                            <div class="panel-container show" role="content">
                                <div class="panel-content">
                                    <table class="">
                                        <tr class="trbg">
                                            <th colspan="6">
                                                <h5>Only Domain Experts
                                                </h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="text-center bg-warning text-white">SlNo</td>
                                            <td class="text-center bg-warning text-white">Name</td>
                                            <td class="text-center bg-warning text-white">Designation</td>
                                            <td class="text-center bg-warning text-white">Address</td>
                                            <td class="text-center bg-warning text-white">Email</td>
                                            <td class="text-center bg-warning text-white">Mobile No</td>
                                        </tr>
                                        <tbody>
                                            @foreach ($domain_experts as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $item['name'] ?? '' }}</td>
                                                    <td>{{ $item['designation'] ?? '' }}</td>
                                                    <td>{{ $item['address'] ?? '' }}</td>
                                                    <td>{{ $item['email_id'] ?? '' }}</td>
                                                    <td>{{ $item['contact_no'] ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <table>
                                    <tr class="trbg">
                                        <th colspan="4">Remark on Domain experts</th>
                                    </tr>
                                    <tr>
                                        <td style="width:15%;">
                                            <b>Supervisor Remark</b>
                                        </td>
                                        <td style="width:35%;">
                                            {{ $tbl_remarks->supervisor }}
                                        </td>

                                        <td style="width:15%;">
                                            <b>NCR Remark</b>
                                        </td>
                                        <td style="width:35%;">
                                            {{ $tbl_remarks->ncr }}
                                        </td>
                                    </tr>
                                </table>
                                {{-- <div class="row mt-3">
                                <div class="col-md-3">
                                    <b>Supervisor Remark on Domain Expert:</b>
                                </div>
                                <div class="col-md-3" >
                                    {{ $tbl_remarks->supervisor }}
                                </div>
                                <div class="col-md-3">
                                    <b>NCR Remark on Domain Expert:</b>
                                </div>
                                <div class="col-md-3" >
                                    {{ $tbl_remarks->ncr }}
                                </div>
                            </div> --}}
                            </div>
                        @endif
                        <br>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Application Remarks</h5>
                                </th>
                            </tr>

                            <tr>
                                @if ($tbl_remarks->ncr_overall != '')
                                    <th>Nodal Center Remarks</th>
                                @endif
                                @if ($tbl_remarks->je_overall != '')
                                    <th>Junior Executive Remarks</th>
                                @endif
                                @if ($tbl_remarks->rnd_cell_overall != '')
                                    <th>R&D Controle Cell Remarks</th>
                                @endif
                                @if ($tbl_remarks->vc_overall != '')
                                    <th>VC Remarks</th>
                                @endif

                            </tr>
                            <tr>
                                @if ($tbl_remarks->ncr_overall != '')
                                    <td>{!! Str::length($tbl_remarks->ncr_overall) > 35
                                        ? Str::limit($tbl_remarks->ncr_overall, 35)
                                        : $tbl_remarks->ncr_overall !!}
                                        @if (Str::length($tbl_remarks->ncr_overall) > 35)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $tbl_remarks->ncr_overall }}');">view</a>
                                        @endif
                                    </td>
                                @endif
                                @if ($tbl_remarks->je_overall != '')
                                    <td>{!! Str::length($tbl_remarks->je_overall) > 35
                                        ? Str::limit($tbl_remarks->je_overall, 35)
                                        : $tbl_remarks->je_overall !!}
                                        @if (Str::length($tbl_remarks->je_overall) > 35)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $tbl_remarks->je_overall }}');">view</a>
                                        @endif
                                    </td>
                                @endif
                                @if ($tbl_remarks->rnd_cell_overall != '')
                                    <td>{!! Str::length($tbl_remarks->rnd_cell_overall) > 35
                                        ? Str::limit($tbl_remarks->rnd_cell_overall, 35)
                                        : $tbl_remarks->rnd_cell_overall !!}
                                        @if (Str::length($tbl_remarks->rnd_cell_overall) > 35)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $tbl_remarks->rnd_cell_overall }}');">view</a>
                                        @endif
                                    </td>
                                @endif
                                @if ($tbl_remarks->vc_overall != '')
                                    <td>{!! Str::length($tbl_remarks->vc_overall) > 35
                                        ? Str::limit($tbl_remarks->vc_overall, 35)
                                        : $tbl_remarks->vc_overall !!}
                                        @if (Str::length($tbl_remarks->vc_overall) > 35)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $tbl_remarks->vc_overall }}');">view</a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        </table>
                        <div class="row text-center">
                            <div class="col-12">
                                <a href="{{ route('nodalcentre.all-application') }}"
                                    class="btn btn-primary mt-2 mb-5">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection
