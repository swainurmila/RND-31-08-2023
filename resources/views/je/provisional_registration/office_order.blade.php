@extends('admin.layouts.app')
@section('heading', '')
@section('sub-heading', '')
@section('content')

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            table,
            td,
            th {
                border: 1px solid;
            }

            th,
            td {
                padding: 6px;
            }

            table {
                border-collapse: collapse;
                font-size: 14.4px;
                width: 100%;
                padding: 3px;
            }

            .container {
                border: 1px solid;
                padding: 40px;
                max-width: 985px;
                color: rgba(0, 0, 0, 0.747);
                margin-bottom: 15px;
            }

            @media print {
                .container {
                border: none;
                padding: 20px;
                max-width: 950px;
                color: rgba(0, 0, 0, 0.747);
                margin-bottom: 12px;
                font-size: 12px;
            }
                .print-button,
                .notify_student,
                .back-button {
                    display: none;
                }

                .main.row {
                    display: flex;
                    flex-wrap: wrap;
                }

                .main .col-md-4 {
                    flex: 0 0 50%;
                    max-width: 50%;
                    padding-right: 20px;
                }

                .main .col-md-8 {
                    flex: 0 0 50%;
                    max-width: 50%;
                }
                .date.col-2{
                    padding-left:0px;
                }
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-10 text-left">
                                    BPUT/R&D/Ph.D/ /{{ date('Y') }}
                                </div>
                                <div class="date col-2 text-right">
                                    Date: {{ $info->registration_date }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="centered-div">
                                    <h4 class="text-center"><u>OFFICE ORDER</u></h4>
                                    <h4 class="text-center">Registration of Student for Ph.D Degree</h4>
                                </div>
                                <div class="row semester-progress">
                                    <p>Upon recommendation of Doctoral Scrutiny Committee (DSC) held on {{$provisional->dsc_approve_date}} & approval of the
                                        Vice Chancellor on
                                        has been registered as a Ph.D Research Scholar under Biju Patnaik University of
                                        Technology, Odisha
                                        w.e.f {{$provisional->approve_date}} consequent to his satisfactory completion of Course work and other qualifying
                                        requirements.
                                        The perticulars of registration are given below: </p>

                                    <div class="main row mb-4">
                                        <div class="col-md-4">
                                            1. Name of the Student
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->name }}
                                        </div>
                                        <div class="col-md-4">
                                            2. Father/Husband's Name
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->father_husband }}
                                        </div>
                                        <div class="col-md-4">
                                            3. Address of cerrespondence
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->permannt_address }}
                                        </div>
                                        <div class="col-md-4">
                                            4. Faculty(Engg./Pharm etc.)
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->name_of_faculty }}
                                        </div>

                                        <div class="col-md-4">
                                            5. Discipline/ Specialization
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->departments_title }}
                                        </div>
                                        <div class="col-md-4">
                                            6. NCR to which Admitted
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->college_name }}
                                        </div>

                                        <div class="col-md-4">
                                            7.Date of Birth
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->dob }}
                                        </div>
                                        <div class="col-md-4">
                                            8. Category
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->category }}
                                        </div>
                                        <div class="col-md-4">
                                            9. Category of Studentship
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->student_category }}
                                        </div>
                                        <div class="col-md-4">
                                            10.Enrollment No. & Date of Enrollment
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->enrollment_no }},&nbsp;&nbsp;&nbsp;{{ $info->enrollment_date }}
                                        </div>
                                        <div class="col-md-4">
                                            11. Regd. No.
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->registration_no }},&nbsp;&nbsp;&nbsp;{{ $info->registration_date }}
                                        </div>
                                        <div class="col-md-4">
                                            12. Earliest Date of Thesis Submission
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $provisional->thesis_submission_date }}
                                        </div>
                                        <div class="col-md-4">
                                            13. Supervisor
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->supervisor_name }}
                                        </div>
                                        <div class="col-md-4">
                                            14. Co-supervisor
                                        </div>
                                        <div class="col-md-8">
                                            :
                                        </div>
                                        <div class="col-md-4">
                                            15. Title of Ph.D work
                                        </div>
                                        <div class="col-md-8">
                                            :&nbsp;&nbsp;{{ $info->topic_of_phd_work }}
                                        </div>
                                        <div class="col-md-4">
                                            16. Course Work Completed(YES/ NO)
                                        </div>
                                        <div class="col-md-8">
                                            : @if ($provisional->course_completed == 1)
                                                &nbsp;&nbsp;Yes
                                            @else
                                                &nbsp;&nbsp;No
                                            @endif
                                        </div>
                                    </div>
                                    <table class="mb-4">
                                        <tr>
                                            <th>SL. No.</th>
                                            <th>Subject Code</th>
                                            <th>Course Title</th>
                                            <th>Grade</th>
                                            <th>Credits</th>
                                        </tr>
                                        @foreach ($coursework_sub as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $val->subject_code }}</td>
                                                <td>{{ $val->course_title }}</td>
                                                <td>{{ $val->grades }}</td>
                                                <td>{{ $val->credits }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><b>TOTAL CREDIT COMPLETED</b></td>
                                            <td colspan="">{{ $provisional->credit_completed }}</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="main row mb-4">
                                        <div class="col-md-4">
                                            17. Validity of Registration
                                        </div>
                                        <div class="col-md-8">
                                            : <b>Six Years from the Date of Enrollment(Renewal as per BPUT, Ph.D Regulation
                                                2019)</b>
                                        </div>
                                        <div class="col-md-4">
                                            18. Fees
                                        </div>
                                        <div class="col-md-8">
                                            : Applicable fees as per the BPUT, Ph.D regulation 2019.
                                        </div>
                                    </div>
                                  
                                    <div class="row mt-4">
                                        {{-- <div class="col-9 text-left">
                                            
                                        </div> --}}
                                        <div class="col-3 text-right">
                                            PIC, Research & Development<br>
                                            BPUT, Odisha, Rourkela
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ url()->previous() }}" class="btn btn-pink back-button">Back</a>
                            <button class="btn btn-warning print-button" onclick="printPage()">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection
{{-- </html> --}}
@section('js')
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
