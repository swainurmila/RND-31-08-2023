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
                        <table>
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
                                <td>
                                    <a href="javascript:void(0);"
                                        onclick="view_file('/upload/aadhar/{{ $student->aadhar_certificate }}')">View</a>
                                </td>
                            </tr>
                        </table>
                        <table class="mt-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Payment Details</h5>

                                </th>
                            </tr>
                            @if (!empty($transaction_history))
                                <tr>
                                    <th>Transaction ID:</b></th>
                                    <td>{{ $transaction_history->transaction_id }}</td>
                                    <th>Invoice:</th>
                                    <td style="text-align:center;"><a href="javascript:void(0);"
                                            onclick="viewInvoice('{{ $student->id }}');"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('je.phd-application-remark', ['id' => $student->id]) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="panel-container show" role="content">
                        <div class="panel-content">
                            <table>
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
                                                onclick="view_file('/upload/phdstudent/{{ $value->certificate }}')">View</a>
                                        </td>
                                        <td><a href="javascript:void(0);"
                                                onclick="view_file('/upload/phdstudent/{{ $value->marksheet }}')">View
                                        </td>
                                        {{-- <td>
                                            <input type="hidden" name="qualification_id[]" value="{{ $value->id }}">
                                            <textarea required name="qualification_remarks[]" class="form-control">{{ $value->nodal_remarks != '' ? $value->nodal_remarks : '' }}</textarea>
                                        </td> --}}
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
                                    {{-- <th>Remarks</th> --}}
                                </tr>
                                @if ($oraga > 0)
                                    @foreach ($organisation as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->organisation_name }}</td>
                                            <td>{{ $value->designation }}</td>
                                            <td>{{ $value->duration }}</td>
                                            <td>{{ $value->natutre_of_job }}</td>
                                            {{-- <td>
                                                <input type="hidden" name="org_id[]" value="{{ $value->id }}">
                                                <textarea required name="org_remarks[]" class="form-control">{{ $value->nodal_remarks != '' ? $value->nodal_remarks : '' }}</textarea>
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
                                                <input type="hidden" name="oth_doc_id[]" value="{{ $value->id }}">
                                                <textarea required name="oth_doc_remarks[]" class="form-control">{{ $value->nodal_remark != '' ? $value->nodal_remark : '' }}</textarea>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center bg-warning text-white">No Documents Upload
                                        </td>
                                    </tr>
                                @endif


                            </table>

                            <table class="mt-2">
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

                        </div>

                    </div>
                </div>
            </div>

            {{-- @if ($domain_experts->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
                
                <div class="card">
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
                                            <select name="ncr_recommendation_status" id="ncr_recommendation_status"
                                                class="form-control">
                                                <option value="1">Recommend</option>
                                                <option value="0">Not Recommended</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}

            <div class="card">
                <div class="card-body">
                    <div class="panel-container show" role="content">
                        <div class="panel-content">
                            <table>
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
                                {{-- <tr>
                                    <td>Remarks</td>
                                    <td colspan="3">
                                        <input type="hidden" name="other_id[]" value="{{ $supervisor->id }}">
                                        <textarea required name="other_remarks[]" class="form-control">{{ $supervisor->nodal_remarks != '' ? $supervisor->nodal_remarks : '' }}</textarea>
                                    </td>
                                </tr> --}}
                            </table>
                        </div><br>
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
                                                    <td class="{{ $fontCase }}">{{ app\Helpers\Helpers::professorsDesignation($item['designation']) ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['address'] ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['email_id'] ?? '' }}</td>
                                                    <td class="{{ $fontCase }}">{{ $item['contact_no'] ?? '' }}</td>
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
                                            <b>NCR Remark</b>
                                        </td>
                                        <td style="width:35%;">
                                            {{ $tbl_remarks->ncr }}
                                        </td>

                                        <td style="width:15%;">
                                            <b>JE Remark</b>
                                        </td>
                                        <td style="width:35%;">
                                            <input type="hidden" name="appl_id" id="appl_id"
                                                value="{{ $student->id }}" />
                                            @if ($student->application_status == 4)
                                                <textarea name="domain_expert_je_remarks" id="domain_expert_remarks" class="form-control" cols="30"
                                                    rows="2" placeholder="Enter domain expert remarks here..." style="width: 93%;" required>{{ $tbl_remarks->je ?? '' }}</textarea>
                                            @else
                                                {{ $tbl_remarks->je ?? '' }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                        <div class="row mt-3" style="padding: 12px;">
                            @if ($student->application_status == 4)
                                <div class="col-md-3">
                                    <span>Recommendation of JE</span>
                                </div>
                                <div class="col-md-3">
                                    <select name="je_recommendation_status" id="je_recommendation_status"
                                        class="form-control" required>
                                        <option value="">--------select--------</option>
                                        <option value="6">Recommended</option>
                                        <option value="7">Not Recommended</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span>Comment:</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="hidden" name="appl_id" id="appl_id" value="{{ $student->id }}" />
                                    <textarea name="phd_app_je_remarks" id="phd_app_je_remarks" class="form-control" cols="30" rows="2"
                                        placeholder="Enter PHD application remarks here..." required></textarea>
                                </div>
                            @else
                                <table class="mb-2">
                                    <tr class="trbg">
                                        <th colspan="2">
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
                                    </tr>
                                </table>
                            @endif
                        </div>

                        @if ($student->application_status === 12)
                            @if ($student->notification_no === null || $student->notification_no === '')
                                <div class="row mt-1">
                                    <table class="mb-2">
                                        <tr class="trbg">
                                            <th colspan="2">
                                                <h5>Notification Details</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Notification No.</th>
                                            <th>Notification Date</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="notification_no" id="notification_no"
                                                    class="form-control notification_no"
                                                    placeholder="Enter the notification no"
                                                    value="{{ $student->notification_no }}" required />
                                                <span id="notification_no_error"></span>
                                            </td>
                                            <td>
                                                <input type="date" name="notification_date" id="notification_date"
                                                    class="form-control notification_date"
                                                    placeholder="{{ $student->notification_date ?? 'Notification date' }}"
                                                    value="{{ $student->notification_date }}" required />
                                                <span id="notification_date_error"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        @endif
                        @if ($student->notified)
                            <div class="row mt-1">
                                <table class="mb-2">
                                    <tr class="trbg">
                                        <th colspan="2">
                                            <h5>Notification Details</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Notification No.</th>
                                        <th>Notification Date</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>{{ $student->notification_no }}</span>
                                        </td>
                                        <td>
                                            <span>{{ Helper::date_format($student->notification_date, '-') }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="panel-container show" role="content">
                                <div class="panel-content">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <a href="{{ route('je.applied-application') }}"
                                                class="btn btn-primary mt-2 mb-5" type="">Back</a>
                                            @if ($tbl_remarks->je_overall == null)
                                                <button class="btn btn-primary mt-2 mb-5" type="submit">Submit</button>
                                            @endif

                                            @if ($student->application_status == 12)
                                                <input type="hidden" name="student_appl_id" id="student_appl_id"
                                                    value="{{ $student->id }}" />
                                                <input type="hidden" name="student_email" id="student_email"
                                                    value="{{ $student->email }}" />

                                                @if ($student->notification_no === null || $student->notification_no === '')
                                                    <button class="btn btn-primary mt-2 mb-5 notify_details"
                                                        type="button">Submit notification details</button>
                                                    <a class="btn btn-primary mt-2 mb-5 notify_view" target="_blank"
                                                        href="{{ route('je.notify.view', $student->id) }}"
                                                        type="button">Notify
                                                        student</a>
                                                @endif

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
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }

        $(document).ready(() => {
            $('.notify_view').addClass('d-none');
            $('.notify_details').on('click', (e) => {
                let appl_id = $('#appl_id').val();
                let notification_no = $('#notification_no').val();
                let notification_date = $('#notification_date').val();

                if (notification_no == null || notification_no == '') {
                    $('#notification_no_error').addClass('text-danger')
                    $('#notification_no_error').text('Please, enter a notification no.')
                    // alert('Please, enter a notification no.');
                } else {
                    if (notification_date == null || notification_date == '') {
                        $('#notification_date_error').addClass('text-danger');
                        $('#notification_date_error').text('Please, enter a notification date.');
                        // alert('Please, enter a notification date.');
                    } else {
                        $('#notification_no_error').removeClass('text-danger')
                        $('#notification_no_error').text('')

                        $('#notification_date_error').removeClass('text-danger');
                        $('#notification_date_error').text('');

                        console.log([appl_id, notification_no, notification_date]);
                        $.ajax({
                            type: 'post',
                            url: "{{ route('update.notify.student.details') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "appl_id": appl_id,
                                "notification_no": notification_no,
                                "notification_date": notification_date,
                            },
                            beforeSend: function() {
                                $('.notify_view').addClass('d-none');
                            },
                            success: function(data) {
                                console.log(data);
                                $('.notify_details').addClass('d-none');
                                $('.notify_view').removeClass('d-none');
                                iziToast.success({
                                    title: 'Success',
                                    message: 'Notification details has been updated. Please, click on Notifiy student.',
                                    position: 'topRight'
                                });
                                // location.reload();
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
