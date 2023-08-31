@extends('admin.layouts.app')
@section('heading', 'PHD Student Verify')
@section('sub-heading', 'Verify Student')
@section('content')
    <style>
        .centered-div {
            display: grid;
            place-items: center;
        }

        .sub-heading {
            margin-top: -5px;
        }

        table,
        td,
        th {
            border: 1px solid;
        }

        th,
        td {
            padding: 3px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            font-size: 13px;
        }


        /* .left-div {
            float: left;
            width: 50%;
        }

        .right-div {
            float: right;
            width: 50%;
        } */

        .Signature-right {
            float: right;
        }

        .formdate-right {
            float: right;
        }

        .form-container {
            /* outline: 1px solid #000000; */
            font-size: 13px;
        }

        /* .notify_student {
                                        padding: 5px;
                                        margin-bottom: 50px;
                                        margin-top: 50px;
                                        transform: translateX(10px);
                                    } */

        body {
            color: #000000d6;
        }

        @media print {

            .print-button,
            .notify_student,
            .back-button {
                display: none;
            }

            .notification_no {
                margin-left: 200px;
            }

            .notification_date {
                margin-left: 200px;
            }
        }
    </style>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <div class="form-container">
                            <div class="row">
                                <div class="centered-div">
                                    <h3>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</h3>
                                    <h4 class="sub-heading"><u>OFFICE ORDER ON FORMATION OF DSC FOR THE RESEARCH SCHOLAR</u>
                                    </h4>
                                    <div class="row" style="width:80%">
                                        <div class="col-md-6 text-center notification_no">
                                            <span>No:BPUT/R&D/{{ $student_details['notification_no'] }}</span>
                                        </div>
                                        <div class="col-md-6 text-center notification_date">
                                            <span>Date:{{ date('d/m/Y', strtotime($student_details['notification_date'])) }}</span>
                                        </div>
                                        {{-- <div class="left-div">No:BPUT/R&D/ /{{ $student_details['notification_no'] }}</div>
                                        <div class="right-div">Date:
                                            {{ date('d/m/Y', strtotime($student_details['notification_date'])) }}</div> --}}
                                    </div>
                                    <p style="width: 60%">The undersigned is pleased to convey the enrolment and formation
                                        of DSC of the
                                        following student in
                                        Ph.D Programme of the University as per approval of the competent authority.</p>
                                    <table>
                                        <tr>
                                            <td>1</td>
                                            <td style="width:28%">Name of Candidate</td>
                                            <td>{{ $student_details['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Father's/ Husband's Name</td>
                                            <td>{{ $student_details['father_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Address for Coresspondence</td>
                                            <td>{{ $student_details['address'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Enrollment no. & Date</td>
                                            <td>{{ $student_details['enrollment_no'] . ' & ' . $student_details['enrollment_date'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Department/ NCR to which Admitted</td>
                                            <td>{{ $student_details['department'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Date of Birth</td>
                                            <td>{{ $student_details['dob'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Category(SC/ST/GEN)</td>
                                            <td>{{ $student_details['category'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Category of Studentship(Full Time/ Part Time/ Full Time Special)</td>
                                            <td>{{ $student_details['category_of_studentship'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Faculty(Engg./ Pharm. Etc)</td>
                                            <td>{{ $student_details['faculty_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Discipline/ Specialization</td>
                                            <td>{{ $student_details['descipline'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Board Area of Research Proposed</td>
                                            <td>{{ $student_details['broad_area_of_research_proposed'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>For Sponsored Student(Place of Employeement)</td>
                                            <td>{{ $student_details['place_of_employment'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Name and Address of the Supervisors</td>
                                            <td>
                                                <div class="mt-1">
                                                    <span>a) Supervisor:
                                                    </span><span>{{ $student_details['supervisor_name'] }},</span><br /><span>{{ $student_details['supervisor_address'] }}</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>b) Co-supervisor:
                                                    </span><span>{{ $student_details['co_supervisor_name'] }},</span><br /><span>{{ $student_details['co_supervisor_address'] }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Doctoral Scrutiny Committee of the Student</td>
                                            <td>
                                                <div class="mt-1">
                                                    <span>1) <u>{{ $student_details['chairperson'] }}</u> </span><span>Head
                                                        of the
                                                        Institute(NCR)
                                                        Chairperson</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>2) </span> <u>{{ $student_details['co_chairperson'] }}</u>
                                                    <span>(Head of the
                                                        Dept.)Co-Chairperson</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>3) </span> <u>{{ $student_details['dsc_member1'] }}</u>
                                                    <span>(Expert)Member</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>4) </span> <u>{{ $student_details['dsc_member2'] }}</u>
                                                    <span>(Expert)Member</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>5) </span>
                                                    <u>{{ $student_details['principle_supervisor_member1'] }}</u>
                                                    <span>(Principal
                                                        Supervisor)Member
                                                        Convener</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span>6) </span>
                                                    <u>{{ $student_details['principle_co_supervisor_member1'] }}</u>
                                                    <span>(Co-Supervisor)Joint Member Convener </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <p style="width: 60%">The Chairperson, DSC is requested to hold the meeting of the DSC
                                        for asigning
                                        course work and other action as per PHD regulation 2019.</p>
                                    <div class="row" style="width: 80%">
                                        <div class="col-md-6 text-center">
                                            <span>Date:</span>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <span>PIC(R&D), BPUT</span>
                                        </div>
                                        {{-- <div class="date-left">Date:</div>
                                        <div class="Signature-right">PIC(R&D), BPUT</div> --}}
                                    </div>
                                    <input type="hidden" name="student_appl_id" id="student_appl_id"
                                        value="{{ $student_details['id'] }}">
                                    <input type="hidden" name="student_email" id="student_email"
                                        value="{{ $student_details['email'] }}">
                                    <div class="text-center">
                                        <a href="{{ url()->previous() }}" class="btn btn-pink back-button">Back</a>

                                        @php
                                            $is_notified = !is_null(Auth::guard('web')->user()) ? (Auth::guard('web')->user()->role_id === 12 ? 1 : 0) : 0;
                                        @endphp
                                        @if ($is_notified)
                                        @if ($student_details['notified'] !== 1)
                                                <button class="btn btn-success notify_student" type="button">Notify
                                                    student</button>
                                            @endif
                                        @endif
                                        
                                        <button class="btn btn-warning print-button" onclick="printPage()">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(() => {

            $('.notify_student').on('click', (e) => {

                $.ajax({
                    type: 'post',
                    url: "{{ route('notify.student') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token: "{{ csrf_token() }}",
                        "id": $('#student_appl_id').val(),
                        "to": $('#student_email').val(),
                    },
                    beforeSend: function() {
                        // $('.notify_student').addClass('disabled');
                    },
                    success: function(data) {
                        console.log(data);
                        // $('.notify_student').addClass('d-none');
                                // $('.notify_student').addClass('disabled');
                        // window.location.reload();
                         // location.reload(
                        //     '{{ route('je.phd-application-remark', $student_details['id']) }}'
                        // );

                        iziToast.success({
                            title: 'Success',
                            message: 'Notification mail to student was successfull sent.',
                            position: 'topRight'
                        });
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
