@extends('admin.layouts.app')
@section('heading', 'Personal Information')
@section('sub-heading', 'My Profile')
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
                        <table class="mb-2">
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Presonal Information</h5>
                                </th>
                            </tr>
                            <tr>
                                <th><b>Name Of Student</b></th>
                                <th>{{ $student->first_name.' - '.$student->last_name }}</th>
                                <th>Registration Date.</th>
                                <th>{{ $student->registration_date }}</th>
                            </tr>
                            <tr>
                                <td><b>Registration No: </b></td>
                                <td>{{ $student->registration_no }}</td>
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
                                <td><b>Email :</b></td>
                                <td>{{ $student->email }}</td>
                                <td><b>Father's / Husband's Name:</b></td>
                                <td>{{ $student->father_husband }}</td>
                            </tr>
                            <tr>
                                <td><b>Mobile No:</b></td>
                                <td>{{ $student->phone }}</td>
                                <td><b>PHD Registration No:</b></td>
                                <td>{{ $student->phd_registration_no }}</td>
                            </tr>
                            <tr>
                                <td>Ncr Department</td>
                                <td>{{ $student->ncr_department }}</td>
                                <td><b>Permanent Address:</b></td>
                                <td>{{ $student->permannt_address }}</td>
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
                                <td><b>Caste:</b></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection
