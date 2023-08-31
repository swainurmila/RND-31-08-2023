@extends('admin.layouts.app')
@section('heading', 'SEMESTER PROGRESS REPORT')
@section('sub-heading', 'SEMESTER PROGRESS REPORT')
@section('content')
    <style>
        .row.semester {
            padding-left: 40px;
            padding-right: 40px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }

        .panel-content {
            padding: 40px 30px;
            border: 2px solid #ccc;
        }

        .status {
            justify-content: space-between;
        }
    </style>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content" style="padding: 20px 30px; ">
                                <div class="section-title form-section-title mb-3">
                                    <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                            ROURKELA</b></h3>
                                    <h4 class="text-center"><u><b>SEMESTER REGISTRATION FORM FOR Ph.D. PROGRAMME</b></u>
                                    </h4>
                                </div>

                                <form id="reg_form" method="POST"
                                    action="{{ route('semester-registration-form-submit') }}" enctype="multipart/form-data"
                                    onsubmit="">
                                    @csrf

                                    <div class="row semester">
                                        <table>
                                            <tr>
                                                <th class="text-capitalize">Name Of The Research Student</th>
                                                <td>
                                                    <input type="text" class="form-control" name="student_name"
                                                        value="{{ $info->name }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Name of the BPUT- NCR </th>
                                                <td>
                                                    <input type="text" class="form-control" name="ncr_name"
                                                        value="{{ $info->college_name }}" readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-capitalize">Name of the of the Department </th>
                                                <td>
                                                    <input type="text" class="form-control" name="department"
                                                        value="{{ $info->departments_title }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Enrollment No.</th>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{ $info->enrollment_no }}" readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-capitalize"> Date of Enrollment </th>
                                                <td>
                                                    <input value="{{ $info->enrollment_date }}" type="text"
                                                        class="form-control" name="enrollment_no" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Regd. No </th>
                                                <td>
                                                    <input type="text" class="form-control" name="registration_no"
                                                        value="{{ $info->registration_no ? $info->registration_no : '-' }}"
                                                        readonly>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Date of Registration </th>
                                                <td>
                                                    <input type="text" class="form-control" name="reg_no" placeholder=""
                                                        value="{{ $info->registration_date ? $info->registration_date : '-' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Name of the Research Supervisor </th>
                                                <td>
                                                    <input type="text" class="form-control" name="reg_date"
                                                        value="{{ $info->supervisor_name }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-capitalize">Title of Ph.D. work </th>
                                                <td>
                                                    <input type="text" class="form-control" name="reg_date"
                                                        value="{{ $info->topic_of_phd_work }}" readonly>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <th class="text-capitalize">Board Area of Research </th>
                                                <td>
                                                    <input type="text" class="form-control" name="board_area_research"
                                                        value="" required>
                                                  
                                                </td>
                                            </tr> --}}
                                            <tr>
                                                <th class="text-capitalize">Semester </th>
                                                <td>
                                                    <select class="form-select form-control"
                                                        aria-label="Default select example" name="semester" id="semester" required>
                                                        <option value="">Select Semester</option>
                                                        <option value="1">1st</option>
                                                        <option value="2">2nd</option>
                                                        <option value="3">3rd</option>
                                                        <option value="4">4th</option>
                                                        <option value="5">5th</option>
                                                        <option value="6">6th</option>
                                                        <option value="7">7th</option>
                                                        <option value="8">8th</option>
                                                        <option value="9">9th</option>
                                                        <option value="10">10th</option>
                                                        <option value="11">11th</option>
                                                        <option value="12">12th</option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </table>
                                        <table>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>List of Coursework Assigned</th>
                                                <th>Credits</th>
                                                <th>Status</th>
                                            </tr>
                                            @foreach ($coursework_sub as $key => $val)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $val->course_title }}</td>
                                                    <td>{{ $val->credits }}</td>
                                                    <td> <select class="form-control" id="sub_status"
                                                            placeholder="Name Of NCR." name="sub_status[]" required>
                                                            <option value="">---select----</option>
                                                            <option value="1">Completed</option>
                                                            <option value="0">On Going</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="elapsed_month">Months Elapsed Since Enrollment</label>
                                                <input type="text" class="form-control" name="month_elapsed" id="month_elapsed"
                                                    value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_status">Registration Status Upto Date</label><br>
                                                <input class="form-check-input" type="radio" name="reg_status"
                                                    id="reg_status" value="1" required> <b>Yes</b>&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="reg_status"
                                                    id="reg_status" value="0" required> <b>No</b>
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="sumb_btn text-center">
                                                <input class="btn btn-primary" type="submit" value="Save & Next">
                                                <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script>
         $(document).ready(function() {
            $('#reg_form').validae({
                alet(1);
                errorElement: 'span', // Specify the element to be used for error messages
                errorClass: 'text-danger', // Specify the CSS class for error messages
                rules: {
                    semester: {
                        required: true
                    },
                    sub_status: {
                        required: true
                    }
                    month_elapsed:{
                        required: true
                    }
                    reg_status:{
                        required: true
                    }
                },
                messages: {
                    semester: {
                        required: "Please select the semester."
                    },
                    sub_status: {
                        required: "Please select the subject status."
                    },
                    month_elapsed: {
                        required: "Please enter the month elapsed."
                    }
                    reg_status:{
                        required: "Please select registration status"
                    }
                },
                errorPlacement: function(error, element) {
                    // Add error messages after the respective input fields
                    error.insertAfter(element);
                }
            });
        });
    </script>
        <script>
            function view_file(url) {
                // alert(url);
                event.preventDefault();
                $('#view_upload_image').html('<embed src="' + url +
                    '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
                $('#upload_image_view').modal('show');
            }
        </script>
        

    @endsection
