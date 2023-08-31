@extends('admin.layouts.app')
@section('heading', 'PHD Application Preview')
@section('sub-heading', 'PHD Application')
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
                        <?php if($type == 'PHD'){ ?>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Presonal Information
                                        <span
                                            class="badge bg-{{ Helper::appliedApplicationStatusColor($student->application_status) }} float-end text-uppercase p-1">
                                            Application Status :
                                            {{ Helper::appliedApplicationStatus($student->application_status) }}
                                        </span>
                                    </h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Enrollment Number</th>
                                <th>{{ $student->enrollment_no }}</th>
                                <th>Enrollment Date</th>
                                <th>{{ Helper::date_format($student->enrollment_date, '-') }}</th>
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
                                <td><b>Caste:</b></td>
                                <td>{{ $student->category }}</td>
                            </tr>
                            <tr>
                                <td><b>PWD Certificate:</b></td>
                                <td>
                                    @if ($student->hadicap_certificate != '')
                                        <a href="javascript:void(0);"
                                            onclick="view_file('/upload/hadicap_certificate/{{ $student->hadicap_certificate }}')">View</a>
                                    @else
                                        <span class="text-warning">Not Available</span>
                                    @endif
                                </td>
                                <td><b>Caste Certificate:</b></td>
                                <td>
                                    @if ($student->category_certificate != '')
                                        <a href="javascript:void(0);"
                                            onclick="view_file('/upload/caste_certificate/{{ $student->category_certificate }}')">View</a>
                                    @else
                                        <span class="text-warning">Not Available</span>
                                    @endif
                                    {{-- <a href="javascript:void(0);"
                                        onclick="view_file('/upload/caste_certificate/{{ $student->category_certificate }}')">View</a> --}}
                                </td>
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
                                <td>{{ $transaction_history->transaction_id }}</td>
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
                                {{-- <th>Nodal Center Remarks</th> --}}
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
                                {{-- <th>Nodal Center Remarks</th> --}}
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
                        <?php } ?>
                        <?php if($type == 'Supervisor'){ ?>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Supervisor Change Information</h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Enrollment Number</th>
                                <th>{{ $student->enrollment_no }}</th>
                                <th>Enrollment Date</th>
                                <th>{{ $student->created_at }}</th>
                            </tr>
                            <tr>
                                <td> <b>Candidate Name: </b> </td>
                                <td>{{ $student->phd_student_name }}</td>
                                <td style="text-align:right;">
                                    @php
                                        $img = $student->photo != '' ? $student->photo : 'student.jpg';
                                    @endphp
                                    <img src="{{ asset('/upload/photo/' . $img) }}" alt="Student Photo"
                                        style="max-width: 80px;">

                                </td>
                                <td style="text-align:center;">
                                    <img src="{{ asset('/upload/signature/' . @$student->signature) }}" alt="Signature"
                                        style="max-width: 80px;">

                                </td>
                            </tr>
                            <tr>
                                <td><b>Registration No:</b></td>
                                <td>{{ $student->registration_no }}</td>
                                <td><b>Nodal Centre:</b></td>
                                <td>{{ $student->name_of_ncr }}</td>
                            </tr>
                            <tr>
                                <td><b>Topic Of PHD Work:</b></td>
                                <td>{{ $student->title_of_phd }}</td>
                                <td><b>Branch/Specialisation:</b></td>
                                <td>{{ $student->branch_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Present Research Supervisor Name:</b></td>
                                <td>{{ $student->present_research_supervisor }}</td>
                                <td><b>Proposed Research Supervisor Name:</b></td>
                                <td>{{ $student->proposed_research_supervisor }}</td>
                            </tr>
                            <tr>
                                <td><b>Present Co.Supervisor Name:</b></td>
                                <td>{{ $student->pres_cosupervisor_name }}</td>
                                <td><b>Proposed Co. Supervisor Name:</b></td>
                                <td>{{ $student->pros_resc_cosupervisor }}</td>
                            </tr>
                        </table>
                        <?php } ?>
                        <?php if($type == 'Nodal'){ ?>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Presonal Information</h5>
                                </th>
                            </tr>
                            <tr>
                                <th>Enrollment Number</th>
                                <th>{{ $student->enrollment_no }}</th>
                                <th>Enrollment Date</th>
                                <th>{{ $student->created_at }}</th>
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
                                    <img src="{{ asset('/upload/signature/' . @$student->signature) }}" alt="Signature"
                                        style="max-width: 80px;">

                                </td>
                            </tr>
                            <tr>
                                <td><b>Registration No:</b></td>
                                <td>{{ $student->registration_no }}</td>
                                <td><b>Nodal Centre:</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Faculty Of:</b></td>
                                <td>{{ $student->faculty_of }}</td>
                                <td><b>Branch/Specialisation:</b></td>
                                <td>{{ $student->branch_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Topic Of Research Work:</b></td>
                                <td>{{ $student->topic_of_research }}</td>
                                <td><b>Present Status Of Research Work:</b></td>
                                <td>{{ $student->present_status_research }}</td>
                            </tr>
                            <tr>
                                <td><b>Present Nodal Research Centre:</b></td>
                                <td>{{ $student->present_nodal_centre }}</td>
                                <td><b>Name Of the Present Supervisor:</b></td>
                                <td>{{ $student->present_supervisor_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Name Of the Present Co.Supervisor:</b></td>
                                <td>{{ $student->co_supervisor_name }}</td>
                                <td><b>Proposed Nodal Research Centre:</b></td>
                                <td>{{ $student->proposed_nodal_centre }}</td>
                            </tr>
                            <tr>
                                <td><b>Name Of Proposed Supervisor:</b></td>
                                <td>{{ $student->proposed_supervisor }}</td>
                                <td><b>Name Of Proposed Co.Supervisor:</b></td>
                                <td>{{ $student->proposed_co_supervisor }}</td>
                            </tr>
                        </table>
                        <?php } ?>
                        <?php if($type == 'PHD'){ ?>
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
                        <table class="mt-2 mb-2">
                            <tr class="trbg">
                                <th>
                                    <h5>PHD Signed Application File</h5>
                                </th>

                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="view_file('/upload/phd_app_certi/{{ $student->phd_app_file }}')">
                                        View Upload File</a>
                                </td>
                            </tr>
                        </table>
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
                                <td><b>Proposed Supervisor Name:</b></td>
                                <td>{{ $supervisor->supervisor_name }}</td>
                                <td><b>Supervisor Address:</b></td>
                                <td>{{ $supervisor->supervisor_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Supervisor E-Mail Id:</b></td>
                                <td>{{ $supervisor->supervisor_email }}</td>
                                <td><b>Supervisor Phone:</b></td>
                                <td>{{ $supervisor->supervisor_phone }}</td>
                            </tr>
                            @if ($dse != '')
                                <tr>
                                    <td><b>Proposed DSE Name:</b></td>
                                    <td>{{ $supervisor->co_supervisor_name }}</td>
                                    <td><b>DSE E-Mail:</b></td>
                                    <td>{{ $supervisor->co_supervisor_email }}</td>
                                </tr>
                                <tr>
                                    <td><b>DSE Address :</b></td>
                                    <td>{{ $supervisor->co_supervisor_address }}</td>
                                    <td><b>DSE Phone :<b></td>
                                    <td>{{ $supervisor->co_supervisor_phone }}</td>
                                </tr>
                            @endif
                        </table>
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
                                                @php
                                                    $fontCase = $item['status'] == 1 ? 'font-weight-bold' : '';
                                                @endphp
                                                <tr>
                                                    <td class="{{ $fontCase }}">{{ ++$key }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['name'] ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">
                                                        {{ app\Helpers\Helpers::professorsDesignation($item['designation']) ?? '' }}
                                                    </td>
                                                    <td class="{{ $fontCase }}">{{ $item['address'] ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['email_id'] ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['contact_no'] ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <form
                                    action="{{ route('control-cell.approve-application', ['id' => $student->id, 'type' => $type]) }}"
                                    method="post">
                                    @csrf
                                    <table>
                                        <tr class="trbg">
                                            <th colspan="4">Remark on Domain experts</th>
                                        </tr>
                                        <tr>
                                            @if ($student->application_status == 10)
                                                <td style="width:15%;">
                                                    <b>VC Remark</b>
                                                </td>
                                                <td style="width:35%;">
                                                    {{ $tbl_remarks->vc }}
                                                </td>
                                            @else
                                                <td style="width:15%;">
                                                    <b>JE Remark</b>
                                                </td>
                                                <td style="width:35%;">
                                                    {{ $tbl_remarks->je }}
                                                </td>
                                            @endif
                                            <td style="width:15%;">
                                                <b>RND cell Remark</b>
                                            </td>
                                            <td style="width:35%;">
                                                @if ($student->application_status == 6)
                                                    <input type="hidden" name="appl_id" id="appl_id"
                                                        value="{{ $student->id }}" />
                                                    <textarea name="domain_expert_rndcell_remarks" id="domain_expert_rndcell_remarks" class="form-control"
                                                        cols="30" rows="2" placeholder="Enter domain expert remarks here..." style="width: 93%;" required>{{ $tbl_remarks->rnd_cell ?? '' }}</textarea>
                                                @else
                                                    {{ $tbl_remarks->rnd_cell ?? '' }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    {{-- <div class="row mt-3">
                                        <div class="col-md-3">
                                            <span><b>JE Remark on Domain Expert:</b></span>
                                        </div>
                                        <div class="col-md-3">
                                            {{ $tbl_remarks->je ?? '' }}
                                        </div>
                                        <br>
                                        @if ($student->application_status == 6)
                                            <div class="col-md-3">
                                                <b>RND cell Remark on Domain Expert:</b>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="hidden" name="appl_id" id="appl_id"
                                                    value="{{ $student->id }}" />
                                                <textarea name="domain_expert_rndcell_remarks" id="domain_expert_rndcell_remarks" class="form-control"
                                                    cols="30" rows="2" placeholder="Enter domain expert remarks here..." style="width: 93%;">{{ $tbl_remarks->rnd_cell ?? '' }}</textarea>
                                            </div>
                                        @else
                                            <div class="col-md-3">
                                                <span><b>RND cell Remark on Domain Expert:</b></span>
                                            </div>
                                            <div class="col-md-3">
                                                {{ $tbl_remarks->rnd_cell ?? '' }}
                                            </div>
                                        @endif

                                    </div> --}}
                            </div>
                        @endif
                        <br>
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="3">
                                    <h5>Application Remarks</h5>
                                </th>
                            </tr>
                            <tr>
                                @if ($tbl_remarks->je_overall != '')
                                    <th>JE Remarks</th>
                                @endif
                                @if ($tbl_remarks->rnd_cell_overall != '')
                                    <th>R&D Controle Cell Remarks</th>
                                @endif
                                @if ($tbl_remarks->vc_overall != '')
                                    <th>VC Remarks</th>
                                @endif

                            </tr>
                            <tr>
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
                        <?php } ?>

                        <div class="row mt-3">
                            @if ($student->application_status == 6)
                                <input type="hidden" name="appl_id" id="appl_id" value="{{ $student->id }}" />
                                <div class="col-md-3">
                                    <span>Recommendation of RND cell</span>
                                </div>
                                <div class="col-md-3">
                                    <select name="rndcell_recommendation_status" id="rndcell_recommendation_status"
                                        class="form-control" required>
                                        <option value="">--------select--------</option>
                                        <option value="8">Recommended</option>
                                        <option value="9">Not Recommended</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span>Comment:</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="hidden" name="appl_id" id="appl_id" value="{{ $student->id }}" />
                                    <textarea name="phd_app_rndcell_remarks" id="phd_app_rndcell_remarks" class="form-control" cols="30"
                                        rows="2" placeholder="Enter PHD application remarks here..." required></textarea>
                                </div>
                            @elseif ($student->application_status == 10)
                                <div class="col-md-2">
                                    <span>Transfer to JE</span>
                                </div>
                                <div class="col-md-4">
                                    <select name="transfer_to_status" id="transfer_to_status" class="form-control"
                                        required>
                                        <option value="">--------select--------</option>
                                        <option value="12">Juniour Executive</option>
                                        {{-- <option value="9">No</option> --}}
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span>Comment:</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="hidden" name="appl_id" id="appl_id" value="{{ $student->id }}" />
                                    <textarea name="transfer_to_remarks" id="transfer_to_remarks" class="form-control" cols="30" rows="2"
                                        placeholder="Enter PHD application remarks here..." required></textarea>
                                    <span id="transfer_to_remarks_error" class="d-none">Please, fill some remarks
                                        here</span>
                                </div>
                            @endif
                        </div>
                        <div class="row text-center">
                            <div class="col-12">
                                <a href="{{ route('control-cell.applied-application') }}"
                                    class="btn btn-primary mt-2 mb-5" type="">Back</a>

                                @if ($tbl_remarks->rnd_cell_overall == null || $student->application_status == 10)
                                    <button class="btn btn-primary mt-2 mb-5" type="submit">Submit</button>
                                @endif

                                {{-- for now not in use disabled with false application status --}}
                                @if ($student->application_status == 15)
                                    <button class="btn btn-primary mt-2 mb-5 update_remarks"
                                        type="button">Update</button>
                                @endif

                                {{-- @if ($student->application_status == 11 || $student->application_status == 22)
                                        <a href="{{ route('nodalcentre.preview-application', ['id' => $student->id]) }}"
                                            class="btn btn-success mt-2 mb-5">Preview</a>
                                    @endif --}}
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(() => {

            // $('#transfer_to_remarks').on('blur', (e) => {
            //     let appl_id = $('#appl_id').val();
            //     let transfer_to_status = $('#transfer_to_status').val();
            //     let transfer_to_remarks = $('#transfer_to_remarks').val();

            //     console.log(transfer_to_remarks);
            //     if (transfer_to_remarks == '' || transfer_to_remarks == null) {
            //         console.log('yes');
            //         $('.update_remarks').addClass('disabled');
            //         $('#transfer_to_remarks_error').removeClass('d-none');
            //         $('#transfer_to_remarks_error').addClass('text-danger');
            //         $('#transfer_to_remarks_error').text('Please, fill some remarks here');
            //     } else {
            //         console.log('no');
            //         $('.update_remarks').removeClass('disabled');
            //         $('#transfer_to_remarks_error').addClass('d-none');
            //     }
            // });

            $('.update_remarks').on('click', (e) => {
                let appl_id = $('#appl_id').val();
                let transfer_to_status = $('#transfer_to_status').val();
                let transfer_to_remarks = $('#transfer_to_remarks').val();

                let url = "{{ route('control-cell.update.transfer.to.remarks') }}";
                $.ajax({
                    url: url,
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        appl_id: appl_id,
                        transfer_to_status: transfer_to_status ?? 12,
                        transfer_to_remarks: transfer_to_remarks,
                    },
                    cache: true,
                    processData: true,
                    success: function(data) {
                        console.log(data);
                        $('#update_remarks').hide();
                        // window.location.reload();
                        // location.reload();
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection
