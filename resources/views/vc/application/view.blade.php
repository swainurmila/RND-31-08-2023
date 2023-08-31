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
    </style>


    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <table>
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Presonal Information</h5>

                                </th>
                            </tr>
                            <tr>
                                <th>Enrollment Number</th>
                                <th colspan="3">{{ $student->enrollment_no }}</th>
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
                                <td><b>Registration No:</b></td>
                                <td>{{ $student->registration_no }}</td>
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
                                <td>{{ $student->dob }}</td>
                                <td><b>Nationality:</b></td>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                            <tr>
                                <td><b>Student Category:</b></td>
                                <td>{{ $student->student_category }}</td>
                                <td><b>Category:</b></td>
                                <td>{{ $student->category }}</td>
                            </tr>
                        </table>
                        <table class="mt-2">
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
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('control-cell.edit-application', ['id' => $student->id]) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="panel-container show" role="content">
                        <div class="panel-content">
                            <table>
                                <tr class="trbg">
                                    <th colspan="9">
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
                                    <th>Upload File</th>
                                    <th>Nodal Center Remarks</th>
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
                                        <td>
                                            {!! Str::length($value->nodal_remarks) > 10 ? Str::limit($value->nodal_remarks, 10) : $value->nodal_remarks !!}
                                            @if (Str::length($value->nodal_remarks) > 10)
                                                <a href="javascript:void(0);"
                                                    onclick="view_remark('{{ $value->nodal_remarks }}');">view</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="panel-container show" role="content">
                        <div class="panel-content">
                            @php
                                $oraga = count($organisation);
                                $dse = $supervisor->co_supervisor_name;
                            @endphp
                            <table>
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
                                    <th>Nodalcenter Remarks</th>
                                </tr>
                                @if ($oraga > 0)
                                    @foreach ($organisation as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->organisation_name }}</td>
                                            <td>{{ $value->designation }}</td>
                                            <td>{{ $value->duration }}</td>
                                            <td>{{ $value->natutre_of_job }}</td>
                                            <td>
                                                {!! Str::length($value->nodal_remarks) > 10 ? Str::limit($value->nodal_remarks, 10) : $value->nodal_remarks !!}
                                                @if (Str::length($value->nodal_remarks) > 10)
                                                    <a href="javascript:void(0);"
                                                        onclick="view_remark('{{ $value->nodal_remarks }}');">view</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center bg-warning text-white">No organisation mention
                                        </td>
                                    </tr>
                                @endif


                            </table>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="panel-container show" role="content">
                        <div class="panel-content">
                            <table>
                                <tr class="trbg">
                                    <th colspan="4">
                                        <h5>Other Details</h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Proposed Supervisor Name:</th>
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
                                <tr>
                                    <th>Nodal Center Remarks</th>
                                    <td>
                                        {!! Str::length($supervisor->nodal_remarks) > 10 ? Str::limit($supervisor->nodal_remarks, 10) : $supervisor->nodal_remarks !!}
                                        @if (Str::length($supervisor->nodal_remarks) > 10)
                                            <a href="javascript:void(0);"
                                                onclick="view_remark('{{ $supervisor->nodal_remarks }}');">view</a>
                                        @endif

                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-body">
                            <div class="panel-container show" role="content">
                                <div class="panel-content">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            @if ($student->application_status == 2)
                                                <a href="{{ route('control-cell.preview-application', ['id' => $student->id]) }}"
                                                    class="btn btn-success mt-2 mb-5">Preview</a>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
@endsection

@section('js')
    <script>
        function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>
@endsection
